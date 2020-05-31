class CalcControle {
  constructor() {
    this._audio = new Audio("click.mp3");
    this._audioOnoff = false;
    this._lastOperation = "";
    this._lastNumber = "";

    this._operation = [];
    this._locale = "pt-BR";
    this._displayCaclTime = document.querySelector("#display");
    this._dateEl = document.querySelector("#data");
    this._timeEl = document.querySelector("#hora");
    this._currentDate;
    this.initialize();
    this.initButtonsEvents();
    this.initKeyboard();
  }
  // metodo inicializador
  initialize() {
    this.setdisplatDateTime();

    setInterval(() => {
      this.setdisplatDateTime();
    }, 1000);

    this.setLastNumberToDisplay();
    this.pasteFromClipBoard();

    document.querySelectorAll(".btn-ac").forEach((btn) => {
      btn.addEventListener(".btn-ac", (e) => {
        this.toggleAudio();
      });
    });
  }

  toggleAudio() {
    this._audioOnoff = !this._audioOnoff;
  }

  playAudio() {
    if (this._audioOnoff) {
      this._audio.currentTime = 0;
      this._audio.play();
    }
  }

  //   evento de copia e cola
  copyToClipboard() {
    let input = document.createElement("input");

    input.value = this.displayCal;

    document.body.appendChild(input);

    input.select();

    document.execCommand("Copy");
  }
  // evento de colar texto
  pasteFromClipBoard() {
    document.addEventListener("paste", (e) => {
      let text = e.clipboardData.getData("Text");

      this.displayCal = parseFloat(text);

      console.log(text);
    });
  }

  initKeyboard() {
    this.playAudio();

    document.addEventListener("keyup", (e) => {
      switch (e.key) {
        case "Escape":
          this.clearAll();
          break;
        case "Backspace":
          this.clearEntry();
          break;
        case "+":
        case "-":
        case "*":
        case "/":
        case "%":
          this.addOperation(e.key);
          break;
        case "Enter":
        case "=":
          this.calc();
          break;
        case ".":
        case ",":
          this.addDot();
          break;

        case "0":
        case "1":
        case "2":
        case "3":
        case "4":
        case "5":
        case "6":
        case "7":
        case "8":
        case "9":
          this.addOperation(parseInt(e.key));
          break;
        case "c":
          if (e.keyCode) this.copyToClipboard();
          break;
        case "v":
          break;
      }
    });
  }

  // evento de botao
  addEventListenerAll(element, events, fn) {
    events.split(" ").forEach((event) => {
      element.addEventListener(event, fn, false);
    });
  }

  clearAll() {
    this._operation = [];
    this._lastNumber = "";
    this._lastOperation = "";
    this.setLastNumberToDisplay();
  }

  clearEntry() {
    this._operation.pop();

    this.setLastNumberToDisplay();
  }

  getLastOperation() {
    return this._operation[this._operation.length - 1];
  }

  setLastOperation(value) {
    this._operation[this._operation.length - 1] = value;
  }

  isOperator(value) {
    return ["+", "-", "*", "/", "%"].indexOf(value) > -1;
  }
  pushOperation(value) {
    this._operation.push(value);

    if (this._operation.length > 3) {
      this.calc();
    }
  }

  getResult() {

    try {
      return eval(this._operation.join(""));  
    } catch(e) {
      setTimeout(() => {
        this.setError();
      }, 1)
    }
    
  }

  calc() {
    let last = "";

    this._lastOperation = this.getLastItem();

    if (this._operation.length < 3) {
      let firstItem = this._operation[0];
      this._operation = [firstItem, this._lastOperation, this._lastNumber];
    }

    if (this._operation.length > 3) {
      last = this._operation.pop();

      this._lastNumber = this.getResult();
    } else if (this._operation.length == 3) {
      this._lastNumber = this.getLastItem(false);
    }

    let result = this.getResult();

    if (last == "%") {
      result /= 100;
      this._operation = [result];
    } else {
      this._operation = [result];
      if (last) this._operation.push(last);
    }
    this.setLastNumberToDisplay();
  }

  getLastItem(isOperador = true) {
    let lastItem;

    for (let i = this._operation.length - 1; i >= 0; i--) {
      if (this.isOperator(this._operation[i]) === isOperador) {
        lastItem = this._operation[i];
        break;
      }
    }
    if (!lastItem) {
      lastItem = isOperador ? this._lastOperation : this._lastNumber;
    }

    return lastItem;
  }

  setLastNumberToDisplay() {
    let lastNumber = this.getLastItem(false);

    if (!lastNumber) lastNumber = 0;
    this.displayCal = lastNumber;
  }

  addOperation(value) {
    if (isNaN(this.getLastOperation())) {
      if (this.isOperator(value)) {
        this.setLastOperation(value);
      } else {
        this.pushOperation(value);

        this.setLastNumberToDisplay();
      }
    } else {
      if (this.isOperator(value)) {
        this.pushOperation(value);
      } else {
        let newValue = this.getLastOperation().toString() + value.toString();
        this.setLastOperation(newValue);

        // atualizar display
        this.setLastNumberToDisplay();
      }
    }
  }

  setError() {
    this.displayCal = "Error";
  }

  addDot() {
    let lastOperation = this.getLastOperation();
    if (
      typeof lastOperation === "string" &&
      lastOperation.split("").indexOf(".") > -1
    )
      return;

    if (this.isOperator(lastOperation) || !lastOperation) {
      this.pushOperation("0.");
    } else {
      this.setLastOperation(lastOperation.toString() + ".");
    }

    this.setLastNumberToDisplay();
  }

  execbtn(value) {
    this.playAudio();

    switch (value) {
      case "ac":
        this.clearAll();
        break;
      case "ce":
        this.clearEntry();
        break;
      case "porcento":
        this.addOperation("%");
        break;
      case "divisao":
        this.addOperation("/");
        break;
      case "multiplicacao":
        this.addOperation("*");
        break;
      case "subtracao":
        this.addOperation("-");
        break;
      case "soma":
        this.addOperation("+");
        break;
      case "igual":
        this.calc();
        break;
      case "ponto":
        this.addDot();
        break;

      case "0":
      case "1":
      case "2":
      case "3":
      case "4":
      case "5":
      case "6":
      case "7":
      case "8":
      case "9":
        this.addOperation(value);

        break;
      default:
        this.setError();
    }
  }

  initButtonsEvents() {
    let buttons = document.querySelectorAll("#buttons > g, #parts > g");

    buttons.forEach((btn, index) => {
      // inserir depois este evento de arrastar o mause (mousedown)
      this.addEventListenerAll(btn, "click drag", (e) => {
        let textobtn = btn.className.baseVal.replace("btn-", "");

        this.execbtn(textobtn);
      });

      this.addEventListenerAll(btn, "mouseover mouseup mousedown", (e) => {
        btn.style.cursor = "pointer";
      });
    });
  }

  setdisplatDateTime() {
    this.displayDate = this.currentDate.toLocaleDateString(this._locale, {
      day: "2-digit",
      month: "long",
      year: "numeric",
    });
    this.displayTime = this.currentDate.toLocaleTimeString(this._locale);
  }

  // acesando o atributo horaEl
  get displayTime() {
    return this._timeEl.innerHTML;
  }
  set displayTime(value) {
    this._timeEl.innerHTML = value;
  }
  // acessando o atributo dateEl
  get displayDate() {
    return this._dateEl.innerHTML;
  }
  set displayDate(value) {
    this._dateEl.innerHTML = value;
  }
  // acessadno o atributo displayCalc
  get displayCal() {
    return this._displayCaclTime.innerHTML;
  }
  set displayCal(value) {
    if (value.toString().length > 10) {
      this.setError();
      return false;
    }

    this._displayCaclTime.innerHTML = value;
  }
  // acessando o atributo currentDate
  get currentDate() {
    return new Date();
  }
  set currentDate(valor) {
    this._currentDate = valor;
  }
}
