<?php

//success
//code 200
function success($data, $code = 200)
{
    $message = 'Successfully, Data is received';
    return response()->json([
        'code' => $code,
        'message' => $message,
        'data' => $data
    ]);
}

//code 201
function success_create($message, $code = 201, $data = [])
{
    $message = 'Successfully, created';
    return response()->json([
        'code' => $code,
        'message' => $message,
        'data' => $data
    ]);
}

//code 202
function success_update($data ,$message, $code = 202)
{
    return response()->json([
        'code' => $code,
        'message' => 'Successfully, '.$message.' updated',
        'data' => $data
    ]);
}

//code 204
function success_delete($message, $code = 204, $data = [])
{

}

//end success

//error
//code 400
function error()
{

}

//code 404
function error_validate($validate, $code = 400)
{
    $message = 'Missing fill';
    return response()->json([
        'code' => $code,
        'message' => $message,
        'validate' => $validate
    ]);
}

function error_notFound( $code = 204, $data = [])
{
    return response()->json([
        'code' => $code,
        'message' => 'Error, record not found',
        'data' => $data
    ]);
}
//end error
