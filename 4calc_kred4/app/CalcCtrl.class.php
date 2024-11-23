<?php
require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';
require_once 'Messages.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $messages;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = new Messages();
    }

    public function getParams($request) {
        $this->form->amount = $request['amount'] ?? null;
        $this->form->interest = $request['interest'] ?? null;
        $this->form->years = $request['years'] ?? null;
    }

    public function validate() {
        if (empty($this->form->amount) || empty($this->form->interest) || empty($this->form->years)) {
            $this->messages->addError('All fields are required!');
            return false;
        }
        if (!is_numeric($this->form->amount) || !is_numeric($this->form->interest) || !is_numeric($this->form->years)) {
            $this->messages->addError('All fields must be numeric!');
            return false;
        }
        return true;
    }

    public function calculate() {
        if (!$this->validate()) return;
        $P = floatval($this->form->amount);
        $r = floatval($this->form->interest) / 100 / 12;
        $n = floatval($this->form->years) * 12;
        $this->result->monthlyPayment = ($P * $r) / (1 - pow(1 + $r, -$n));
        $this->result->totalPayment = $this->result->monthlyPayment * $n;
    }

    public function display() {
        global $smarty;
        $smarty->assign('form', $this->form);
        $smarty->assign('result', $this->result);
        $smarty->assign('messages', $this->messages->getErrors());
        $smarty->display('CalcView.tpl');
    }
}
