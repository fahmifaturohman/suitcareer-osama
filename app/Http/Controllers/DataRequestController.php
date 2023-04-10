<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRequestModel;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

class DataRequestController extends Controller
{
    public function __construct()
    {
        $this->DataRequestModel = new DataRequestModel();
        $this->UserModel = new  User();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'datarequest' => $this->DataRequestModel->allData(),
        ];

        return view('admin.data_request',  $data);
    }

    public function detaildata($id)
    {
        if (!$this->DataRequestModel->detailData($id)) {
            abort(404);
        }

        $data = [
            'request' => $this->DataRequestModel->detailData($id),
            'candidate' => $this->DataRequestModel->get_candidate_request($id),
        ];
        if($data['request']->status == "pending") : $this->DataRequestModel->update_status($id,  Auth::user()->id); endif;
        return view('admin.detail_datarequest', $data);
    }

    public function addcandidate()
    {
        $segment = \Request::fullUrl(2);
        $exp = array_reverse(explode('/',$segment));
        $id_request = (int) $exp[1];
        $data = [
            'request' => $this->DataRequestModel->detailData($id_request),
            'requestuser' => $this->UserModel->get()
        ];
        return view('admin.add_candidate', $data);
        //echo json_encode($data);
    }



    //* custom query */
    #search request
    public function cari_request(Request $request) {
        $search = $request->search;
        $data = [
            'datarequest' => $this->DataRequestModel->search_request($search)
        ];
        return view('admin.data_request',  $data);
    }
    
    public function master_request() {
        $data = [
            'request' => $this->DataRequestModel->masterRequest()
        ];

        return view('admin.master_request',  $data);
    }

    public function master_request_delete($id, $request) {

        $key = DataRequestModel::getRowCandidate($id);
        DataRequestModel::where('id',$id)->delete();
        File::delete($key->cv);
        return redirect()->to('data_request/detail_datarequest/'.$request);
    }

    public function master_request_pending() {
        $data = [
            'request' => $this->DataRequestModel->masterRequestPending()
        ];

        return view('admin.master_request_pending',  $data);
    }

    public function master_request_process() {
        $data = [
            'request' => $this->DataRequestModel->masterRequestProcess()
        ];

        return view('admin.master_request_process',  $data);
    }

    public function master_request_success() {
        $data = [
            'request' => $this->DataRequestModel->masterRequestSuccess()
        ];

        return view('admin.master_request_success',  $data);
    }

   
    
}
