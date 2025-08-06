<?php

namespace App\Traits;

trait HasMessagebox
{
    /**
     * Flash a success message
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function flashSuccess($message)
    {
        session()->flash('success', $message);
        return $this->shouldRedirect() ? back() : null;
    }

    /**
     * Flash an error message
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function flashError($message)
    {
        session()->flash('error', $message);
        return $this->shouldRedirect() ? back() : null;
    }

    /**
     * Flash a warning message
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function flashWarning($message)
    {
        session()->flash('warning', $message);
        return $this->shouldRedirect() ? back() : null;
    }

    /**
     * Flash an info message
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function flashInfo($message)
    {
        session()->flash('info', $message);
        return $this->shouldRedirect() ? back() : null;
    }

    /**
     * Flash a success message and redirect
     *
     * @param string $message
     * @param string $route
     * @param array $parameters
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successAndRedirect($message, $route, $parameters = [])
    {
        session()->flash('success', $message);
        return redirect()->route($route, $parameters);
    }

    /**
     * Flash an error message and redirect
     *
     * @param string $message
     * @param string $route
     * @param array $parameters
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function errorAndRedirect($message, $route, $parameters = [])
    {
        session()->flash('error', $message);
        return redirect()->route($route, $parameters);
    }

    /**
     * Flash a warning message and redirect
     *
     * @param string $message
     * @param string $route
     * @param array $parameters
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function warningAndRedirect($message, $route, $parameters = [])
    {
        session()->flash('warning', $message);
        return redirect()->route($route, $parameters);
    }

    /**
     * Flash an info message and redirect
     *
     * @param string $message
     * @param string $route
     * @param array $parameters
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function infoAndRedirect($message, $route, $parameters = [])
    {
        session()->flash('info', $message);
        return redirect()->route($route, $parameters);
    }

    /**
     * Flash a success message and redirect back
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successAndBack($message)
    {
        return back()->with('success', $message);
    }

    /**
     * Flash an error message and redirect back
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function errorAndBack($message)
    {
        return back()->with('error', $message);
    }

    /**
     * Flash a warning message and redirect back
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function warningAndBack($message)
    {
        return back()->with('warning', $message);
    }

    /**
     * Flash an info message and redirect back
     *
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function infoAndBack($message)
    {
        return back()->with('info', $message);
    }

    /**
     * Flash multiple messages at once
     *
     * @param array $messages
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function flashMessages(array $messages)
    {
        foreach ($messages as $type => $message) {
            if (in_array($type, ['success', 'error', 'warning', 'info'])) {
                session()->flash($type, $message);
            }
        }
        
        return $this->shouldRedirect() ? back() : null;
    }

    /**
     * Flash validation errors with custom message
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @param string $customMessage
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function flashValidationErrors($validator, $customMessage = null)
    {
        if ($customMessage) {
            session()->flash('error', $customMessage);
        }
        
        return back()->withErrors($validator)->withInput();
    }

    /**
     * Determine if we should auto-redirect
     *
     * @return bool
     */
    private function shouldRedirect()
    {
        return request()->expectsJson() === false;
    }

    /**
     * Return JSON response with messagebox data
     *
     * @param string $type
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonMessagebox($type, $message, $data = [])
    {
        return response()->json(array_merge([
            'messagebox' => [
                'type' => $type,
                'message' => $message
            ]
        ], $data));
    }

    /**
     * Return JSON success response
     *
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonSuccess($message, $data = [])
    {
        return $this->jsonMessagebox('success', $message, $data);
    }

    /**
     * Return JSON error response
     *
     * @param string $message
     * @param array $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonError($message, $data = [], $status = 400)
    {
        return $this->jsonMessagebox('error', $message, $data)->setStatusCode($status);
    }

    /**
     * Return JSON warning response
     *
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonWarning($message, $data = [])
    {
        return $this->jsonMessagebox('warning', $message, $data);
    }

    /**
     * Return JSON info response
     *
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonInfo($message, $data = [])
    {
        return $this->jsonMessagebox('info', $message, $data);
    }
}