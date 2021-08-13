<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Mosque;
use App\Http\Resources\Mosque as MosqueResource;
   
class MosqueController extends BaseController
{

    public function index()
    {
        $mosques = Mosque::all();
        return $this->sendResponse(MosqueResource::collection($mosques), 'Mosque fetched.');
        
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'imam_name'=>'required',
            'location' => 'required',
            'phone' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());     
          
        }
        $mosque = Mosque::create($input);
        return $this->sendResponse(new MosqueResource($mosque), 'Mosque added.');
    }

   
    public function show($id)
    {
        $mosque = Mosque::find($id);
        if (is_null($mosque)) {
            return $this->sendError('Mosque does not exist.');
        }
        return $this->sendResponse(new MosqueResource($mosque), 'Mosque fetched.');
    }
    

    public function update(Request $request, Mosque $mosque)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'imam_name'=>'required',
            'location' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $mosque->title= $input['title'];
        $mosque->imam_name= $input['imam_name'];
        $mosque->location= $input['location'];
        $mosque->phone= $input['phone'];
        
        $mosque->save();
        
        return $this->sendResponse(new MosqueResource($mosque), 'Mosque updated.');
    }
   
    public function destroy(Mosque $mosque)
    {
        $mosque->delete();
        return $this->sendResponse([], 'mosque deleted.');
    }
}