<?php
class Messages {
    private $errors = [];
    public function addError($msg) {
        $this->errors[] = $msg;
    }
    public function getErrors() {
        return $this->errors;
    }
}
