<?php

namespace System\Session;

interface SessionInterface {
    public function get (string $key);
    public function set (string $key, string $value) :self;
    public function unset (string $key) :void;
    public function destroy () :void;
}