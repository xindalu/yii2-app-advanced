<?php

namespace api\di\interfaces;

interface UserInterface
{
    public function show($id);

    public function all();
}
