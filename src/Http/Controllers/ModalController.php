<?php

namespace Ctrlweb\VoyagerModals\Http\Controllers;

use Request;
use Ctrlweb\VoyagerModals\Modal;
use Illuminate\Support\Facades\View;
use Pvtl\VoyagerPageBlocks\Traits\Blocks;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ModalController extends VoyagerBaseController
{
    use Blocks;

    protected $viewPath = 'voyager-frontend';

    public function getModal($slug)
    {
        //Abort if request is not ajax
        if (! Request::ajax()) {
            abort(404);
        }

        //Get the blocks html if request is ajax
        $modal = Modal::where('slug', '=', $slug)->firstOrFail();
        $blocks = $modal->blocks()
            ->where('is_hidden', '=', '0')
            ->orderBy('order', 'asc')
            ->get()
            ->map(function ($block) {
                return (object) [
                    'id' => $block->id,
                    'page_id' => $block->page_id,
                    'updated_at' => $block->updated_at,
                    'cache_ttl' => $block->cache_ttl,
                    'template' => $block->template()->template,
                    'data' => $block->cachedData,
                    'path' => $block->path,
                    'type' => $block->type,
                ];
            });

        return view('voyager-modals::default', [
            'blocks' => $this->prepareEachBlock($blocks),
            'modal' => $modal,
        ]);
    }

    public function get_modals_for_select(\Illuminate\Http\Request $request){
        $modals = Modal::where('status','ACTIVE');
        if($request->has('search')){
            $modals->where('title','like','%'.$request->input('search').'%');
        }
        $results = [];
        foreach ($modals->get() as $modal){
            $results[] = [
                'id'   => $modal->id,
                'text' => $modal->title,
            ];
        }

        return response()->json([
            'results' => $results,
        ]);
    }
}
