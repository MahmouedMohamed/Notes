<?php

namespace Mahmoued\Notes\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class NoteCannotBeUpdatedException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return Response::json([
            'success' => false,
            'code' => 403,
            'message' => 'Note Must be Updated by its owner',
            'data' => [],
        ], 403);
    }
}
