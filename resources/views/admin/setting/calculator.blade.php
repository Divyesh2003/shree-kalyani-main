@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y" style="position: relative;">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card mb-4">
                        <h5 class="card-header">Calculator</h5>
                        <div class="calculator-container">
                            
                            <div class="calculator">
                                <input type="text" id="display" disabled>
                                <div class="buttons">
                                    <div class="row">
                                        <button onclick="clearDisplay()">C</button>
                                        <button onclick="backspace()" class="backspace">⌫</button>
                                        <button onclick="appendToDisplay('(')"> ( </button>
                                        <button onclick="appendToDisplay(')')"> ) </button>
                                    </div>
                                    <div class="row">
                                        <button onclick="appendToDisplay('/')"> ÷ </button>
                                        <button onclick="appendToDisplay('7')">7</button>
                                        <button onclick="appendToDisplay('8')">8</button>
                                        <button onclick="appendToDisplay('9')">9</button>
                                    </div>
                                    <div class="row">
                                        <button onclick="appendToDisplay('*')"> × </button>
                                        <button onclick="appendToDisplay('4')">4</button>
                                        <button onclick="appendToDisplay('5')">5</button>
                                        <button onclick="appendToDisplay('6')">6</button>
                                    </div>
                                    <div class="row">
                                        <button onclick="appendToDisplay('-')"> - </button>
                                        <button onclick="appendToDisplay('1')">1</button>
                                        <button onclick="appendToDisplay('2')">2</button>
                                        <button onclick="appendToDisplay('3')">3</button>
                                    </div>
                                    <div class="row">
                                        <button onclick="appendToDisplay('+')"> + </button>
                                        <button onclick="appendToDisplay('0')">0</button>
                                        <button onclick="appendToDisplay('.')">.</button>
                                        <button onclick="calculate()">=</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function appendToDisplay(value) {
    document.getElementById('display').value += value;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function backspace() {
    var display = document.getElementById('display');
    display.value = display.value.slice(0, -1);
}

function calculate() {
    var expression = document.getElementById('display').value;
    try {
        var result = eval(expression);
        document.getElementById('display').value = result;
    } catch (error) {
        document.getElementById('display').value = 'Error';
    }
}
document.getElementById('watermark').addEventListener('click', function() {
    window.open('popup.html', 'Popup', 'width=400,height=200');
});
    </script>
    <style>
        .calculator-container {
    position: relative;
    width: 90%;
    max-width: 320px;
    margin: 50px auto;
}

.calculator {
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.watermark {
    position: absolute;
    top: 5px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 12px;
    color: rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

#display {
    width: calc(100% - 40px);
    margin-bottom: 20px;
    padding: 10px;
    font-size: 24px;
    border: none;
    border-radius: 5px;
    text-align: right;
}

.buttons {
    display: grid;
    grid-gap: 10px;
}

.row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 10px;
    justify-content: center;
}

button {
    padding: 15px;
    font-size: 18px;
    border: none;
    border-radius: 10px;
    background-color: #fff;
    color: #333;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.backspace {
    order: 2;
}

button:hover {
    background-color: #e6e6e6;
}

button:active {
    transform: translateY(2px);
}

    </style>
@endsection