<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait BaseResponse{
    protected function successResponse($data, $message = null, $statusCode = Response::HTTP_OK)
	{
        return response([
            'status_code' => $statusCode,
            'status' => true,
            'message' => $message,
            'data' => $data,
        ])->setStatusCode($statusCode);
	}

	protected function errorResponse( $data = null, $message = null, $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
	{
		return response()->json([
            'status_code' => $statusCode,
			'status'=> false,
			'message' => $message,
			'data' => $data,
		])->setStatusCode($statusCode);
	}
}
