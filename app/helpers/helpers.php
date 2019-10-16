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
function success_create($data, $code = 201)
{
    return response()->json([
        'code' => $code,
        'message' => 'Successfully, record created',
        'data' => $data
    ]);
}

//code 202
function success_update($data, $code = 202)
{
    return response()->json([
        'code' => $code,
        'message' => 'Successfully, record updated',
        'data' => $data
    ]);
}

//code 204
function success_delete($data, $code = 204)
{
    return response()->json([
        'code' => $code,
        'message' => 'Successfully, record deleted',
        'data' => $data
    ]);
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
    return response()->json([
        'code' => $code,
        'message' => 'Missing fill',
        'validate' => $validate
    ]);
}

function error_notFound($data, $code = 404)
{
    return response()->json([
        'code' => $code,
        'message' => 'Error, record not found',
        'data' => $data
    ]);
}
//end error
