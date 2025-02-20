function changeCounterMinus(counterid){
    let countInput = document.getElementById(counterid);
    let curretValue = Number(countInput.value)
    if (curretValue > 1 ){
        countInput.value = curretValue - 1
    }

}

function changeCounterPlus(counterid){
    let countInput = document.getElementById(counterid);
    let curretValue = Number(countInput.value)
    countInput.value = curretValue + 1
}