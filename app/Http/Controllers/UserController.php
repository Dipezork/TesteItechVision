<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camera;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\CameraGroup;
use App\Models\User;
use Exception;
use Nette\Utils\Json;

class UserController extends Controller
{
    private $objCamera;
    private $objUser;
    private $objGroup;
    private $objUserGroup;
    private $objCameraGroup;

    public function __construct() {

        $this->objCamera = new Camera();
        $this->objUser = new User();
        $this->objGroup = new Group();
        $this->objUserGroup = new UserGroup();
        $this->objCameraGroup = new CameraGroup();

    }

    public function index()
    {
        try {

            $userId = Auth::id();

            $user = $this->objUser->where('id', $userId)->firstOrFail();

            //usando relacionamento inverso da models
            $cameras = $user->user_groups->groups->pivot->cameras;

            if(count($cameras) > 0)
            {
                throw new Exception("Usuário não tem cameras");
            }
            $cameraNames = [];
            foreach ($cameras as $camera) {
                $cameraNames []  = $camera->name_camera;
            }
            return response()->json([
                'CamerasNames' => $cameraNames
            ]);

        } catch (\Exception $ex) {
           return response()->json(['message' => $ex->getMessage()], 500);
        }

    }
    public function create(Request $request)
    {
        $dataForm = $request->all();
        return response()->json(["message" => "Cadastrado com sucesso", "dataform" => $dataForm], 200);
    }
}
