<?php

namespace GTrader\Indicators;

use GTrader\Indicators\Trader;

class Aroonosc extends Trader
{

    public function runDependencies(bool $force_rerun = false)
    {
        return $this;
    }

    public function traderCalc(array $values)
    {
        if (!($values = trader_aroonosc(
            $values[$this->getInput('input_high')],
            $values[$this->getInput('input_low')],
            $this->getParam('indicator.period')
            ))) {
            error_log('trader_aroonosc returned false');
            return [];
        }
        return [$values];
    }
}
