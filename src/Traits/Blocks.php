<?php

namespace Ctrlweb\VoyagerModals\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Pvtl\VoyagerFrontend\Helpers\BladeCompiler;
use Pvtl\VoyagerFrontend\Helpers\ClassEvents;
use Pvtl\VoyagerPageBlocks\Traits\Blocks as VoyagerPageBlocks;

trait Blocks
{
    use VoyagerPageBlocks {
        VoyagerPageBlocks::prepareEachBlock as parentPrepareEachBlock;
        VoyagerPageBlocks::prepareTemplateBlockTypes as parentPrepareTemplateBlockTypes;
        VoyagerPageBlocks::generatePlaceholders as parentGeneratePlaceholders;
    }
    /**
     * Ensure each page block has the correct data, in the correct format.
     *
     * @param Collection $blocks
     * @return array
     */
    protected function prepareEachBlock(Collection $blocks)
    {
        return $this->parentPrepareEachBlock($blocks);
    }

    /**
     * Ensure each page block has all of the keys from
     * config, in the DB output (to prevent errors in views)
     * + compile each piece of HTML (eg. for short codes).
     *
     * @param $block
     * @return mixed
     * @throws \Exception
     */
    protected function prepareTemplateBlockTypes($block)
    {
        return $this->parentPrepareTemplateBlockTypes($block);
    }

    public function uploadImages(Request $request, array $data, bool $keepFilename = false): array
    {
        foreach ($request->files as $key => $field) {
            if (is_array($request->file($key))) {
                $multiImages = [];
                foreach ($request->file($key) as $key2 => $file) {
                    if ($keepFilename) {
                        $filePath = $file->storeAs('public/', $file->getClientOriginalName());
                    } else {
                        $filePath = $file->store('public/');
                    }
                    $multiImages[] = str_replace('public/', '', $filePath);
                }
                $data[$key] = json_encode($multiImages);
            } else {
                $filePath = $request->file($key)->store('public/');
                $data[$key] = str_replace('public/', '', $filePath);
            }
        }
        return $data;
    }

    public function generatePlaceholders(Request $request): array
    {
        return $this->parentGeneratePlaceholders($request);
    }
}
