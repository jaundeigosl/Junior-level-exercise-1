window.onload = function hide(){
    document.getElementById('makeSection').hidden=true
    document.getElementById('showSection').hidden=true
    document.getElementById('rechargeSection').hidden=true
}

function whichBtn(id){
    const btn = document.getElementById(id)
    let makeSection = document.getElementById('makeSection')
    let showSection = document.getElementById('showSection')
    let rechargeSection = document.getElementById('rechargeSection')

    btn.addEventListener('click', function(e){
        switch(btn.id){

            case 'make':
                makeSection.hidden=false
                showSection.hidden=true
                rechargeSection.hidden=true              
            break;

            case 'show':
                makeSection.hidden=true
                showSection.hidden=false
                rechargeSection.hidden=true 
            break;

            case 'recharge':
                makeSection.hidden=true
                showSection.hidden=true
                rechargeSection.hidden=false
            break;
        }
    })
}
