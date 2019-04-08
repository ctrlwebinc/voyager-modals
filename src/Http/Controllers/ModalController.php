<?php

namespace Ctrlweb\VoyagerModals\Http\Controllers;

use Ctrlweb\VoyagerModals\Modal;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ModalController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        return redirect('/admin/modals');
    }

    /**
     * POST B(R)EAD - Read data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return View
     */
    public function edit(Request $request, $id)
    {
        $modal = Modal::findOrFail($id);

        return view('voyager::modals.edit-add', [
            'modal' => $modal,
        ]);
    }

    /**
     * POST BR(E)AD - Edit data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * POST - Order data.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function sort(Request $request)
    {
    }

    /**
     * POST - Minimize Block
     *
     * @param \Illuminate\Http\Request $request
     */
    public function minimize(Request $request)
    {
    }

    /**
     * POST - Change Modal Layout
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id - the modal id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLayout(Request $request, $id)
    {
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    }

    /**
     * DELETE BREA(D) - Delete data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
    }

}
