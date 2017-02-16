@php
    $sig = $indicator->getSignature();
    $mode = $indicator->getParam('indicator.mode');
    $initial_capital = $indicator->getParam('indicator.initial_capital');
@endphp

<h5>Balance</h5>
<div class="row">
    <div class="col-xs-5">
        <label for="length">Mode</label>
        <select class="btn-primary btn btn-mini"
                id="mode_{{ $sig }}"
                title="Select mode">
            @foreach (['fixed', 'dynamic'] as $m)
                <option
                @if ($m == $mode)
                    selected
                @endif
                value="{{ $m }}">{{ $m }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-5">
        <label for="price">Initial Capital</label>
        <input class="btn-primary btn btn-mini"
                type="text"
                size="5"
                id="initial_capital_{{ $sig }}"
                title="Select the initial cap for the indicator"
                value="{{ $initial_capital }}">
    </div>
    <div class="col-xs-2">
        <button id="save_{{ $sig }}"
                class="btn btn-primary btn-sm trans"
                title="Save changes"
                onClick="return window.save{{ $sig }}()">
            <span class="glyphicon glyphicon-ok"></span>
        </button>
    </div>
</div>

<script>
    window.save{{ $sig }} = function(){
        var params = {
                mode: $('#mode_{{ $sig }}').val(),
                initial_capital: Math.abs(parseInt($('#initial_capital_{{ $sig }}').val()))};
        window.{{ $id }}.requestIndicatorSaveForm('{{ $sig }}', params);
        return false;
    };
</script>
