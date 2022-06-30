<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadPlate;
use Exception;


class ApiController extends Controller
{
    private $objReadPlate;
    public $token = "XXXXXXXXXXXXXXX";

    public function __construct()
    {
        $this->objReadPlate = new ReadPlate();
    }
    public function getPlateDetails(Request $request, int $plate)
    {
        try {

            $token = $request->header('token') ?? NULL;

            if($token != $this->token )
            {
                return response()->json(["message" => "Accesso Negado"], 401);
            }

            $plate = $this->objReadPlate->select('brand', 'model', 'color')->where('plate', $plate)->firstOrFail();
            return response()->json(['plate' => $plate]);
        } catch (Exception $ex) {
            return response()->json(["message" => $ex->getMessage()], 500);
        }
    }
}
