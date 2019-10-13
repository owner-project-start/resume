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
function success_update($message, $code = 202, $data = [])
{
    $message = 'Successfully, updated';
    return response()->json([
        'code' => $code,
        'message' => $message,
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

function error_notFound($message, $code = 204, $data = [])
{
    $message = 'Errors, record not found';
    return response()->json([
        'code' => $code,
        'message' => $message,
        'data' => $data
    ]);
}
//end error
