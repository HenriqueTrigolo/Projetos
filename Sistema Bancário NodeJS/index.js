//modulos externos
const chalk = require('chalk')
const inquirer = require('inquirer')

//modulos internos

const fs = require('fs')

console.log("Iniciamos o Account!")

function operation(){
    inquirer.prompt([{
        type: 'list',
        name: 'action',
        message: 'O que você deseja fazer?',
        choices: ['Criar Conta', 'Consultar Saldo', 'Depositar', 'Sacar', 'Sair'],
    }])
    .then((answer) => {
        const action = answer['action']
        
        if(action === 'Criar Conta'){
            createAccount()
            buildAccount()
        }
        else if(action === 'Consultar Saldo'){
            getAccountBalance()
        }
        else if(action === 'Depositar'){
            deposit()
        }
        else if(action === 'Sacar'){
            withdraw()
        }
        else if(action === 'Sair'){
            console.clear()
            console.log(chalk.bgBlue.bold("Obrigado por utilizar o sistema bancário Accounts!"))
            process.exit()
        }
    })
    .catch(err => console.log(err))
}

// --------------- INICIALIZAÇÃO DO SISTEMA ---------------

operation()


// --------------- FUNÇÕES DE CRIAÇÃO DE CONTA ---------------

// apresenta os textos para criação da conta
function createAccount(){
    console.log(chalk.bgGreen("Parabens por utilizar nosso Banco!"))
    console.log(chalk.green("Defina as opções da sua conta a seguir:"))
}

// cria a conta em um arquivo JSON

function buildAccount(){
    inquirer.prompt([
        {
            name: 'accountName',
            message: 'Digite um nome para sua conta',
        },
    ]).then((answer) => {
        const accountName = answer['accountName']

        console.info(accountName)

        if(!fs.existsSync('accounts')){
            fs.mkdirSync('accounts')
        }

        if(fs.existsSync(`accounts/${accountName}.json`)){
            console.log(chalk.bgRed.bold("Esta conta já existe!"))
            buildAccount()
            return
        }
            
        fs.writeFileSync(`accounts/${accountName}.json`, '{"balance": 0}', function(err){console.log(err)})
        operation()
        
    }).catch(err => console.log(err))
}

// --------------- FUNÇÕES DE DEPOSITO EM CONTA ---------------

// função para depositar um determinado valor na conta expecífica

function deposit(){
    inquirer.prompt([{
        name: 'accountName',
        message: 'Qual o nome da sua conta?'
    }])
    .then((answer) => {
        const accountName = answer['accountName']

        if(!checkAccount(accountName)){
            return deposit()
        }

        inquirer.prompt([{
            name:'amount',
            message: 'Valor para depositar'
        }])
        .then((answer) => {
            const amount = answer['amount']

            addAmount(amount, accountName)
        })
        .catch(err => console.log(err))
    })
    .catch(err => console.log(err))
}

// verifica se a conta existe
function checkAccount(accountName){
    if(!fs.existsSync(`accounts/${accountName}.json`)){
        console.clear()
        console.log(chalk.bgRed.bold("Não existe conta com este nome, verifique o nome correto da conta!"))
        return false
    }

    return true
}


// adiciona um valor em uma conta
function addAmount(amount, accountName){
    const account = getAccount(accountName)

    if(!amount || isNaN(amount) || (amount <= 0) ){
        console.clear()
        console.log(chalk.bgYellow("Ocorreu um erro, tente novamente!"))
        return operation()
    }

    account.balance = parseFloat(amount) + parseFloat(account.balance)

    fs.writeFileSync(`accounts/${accountName}.json`, JSON.stringify(account), function(err){
        console.log(err)
    })
    console.clear()
    console.log(chalk.green(`Foi realizado o depósito de R$${amount} na conta de ${accountName}.`))
    backOrExit()
}

// acessa os dados de uma determinada conta
function getAccount(accountName){
    const accountJSON = fs.readFileSync(`accounts/${accountName}.json`, {
        encoding: 'utf8',
        flag: 'r'
    })

    return JSON.parse(accountJSON)
}

// --------------- FUNÇÕES DE SALDO EM CONTA ---------------

function getAccountBalance(){

    inquirer.prompt([{
        name: 'accountName',
        message: 'Qual o nome da sua conta?'
    }])
    .then((answer) => {
        const accountName = answer['accountName']
        if(!checkAccount(accountName)){
            return getAccountBalance()
        }

        const account = getAccount(accountName)

        console.clear()
        console.log(chalk.green(`O saldo desta conta é de R$${account.balance}`))
        
        backOrExit()
    })
    .catch(err => console.log(err))

}

function backOrExit(){
    inquirer.prompt([{
        type: 'list',
        name: 'action',
        message: 'O que deseja fazer?',
        choices: ['Voltar', 'Sair'],
    }])
    .then((answer) => {
        const action = answer['action']

        if(action === 'Voltar'){
            console.clear()
            return operation()
        }else if(action === 'Sair'){
            console.clear()
            console.log(chalk.bgBlue.bold("Obrigado por utilizar o sistema bancário Accounts!"))
            process.exit()
        }
    })
    .catch(err => console.log(err))
}

// --------------- FUNÇÕES DE SAQUE EM CONTA ---------------

function withdraw(){
    inquirer.prompt([{
        name: 'accountName',
        message: 'Qual o nome da sua conta ?',
    }])
    .then((answer) => {
        const accountName = answer['accountName']

        if(!checkAccount(accountName)){
            return withdraw()
        }

        inquirer.prompt([{
            name: 'amount',
            message: 'Qual o valor que deseja sacar ?'
        }])
        .then((answer) => {
            const amount = answer['amount']

            removeAmount(accountName, amount)
            
        })
        .catch(err => console.log(err))
    })
    .catch(err => console.log(err))
}

function removeAmount(accountName, amount){

    const account = getAccount(accountName)

    if(!amount || isNaN(amount) || (amount <= 0)){
        console.clear()
        console.log(chalk.bgYellow("Ocorreu um erro, tente novamente!"))
        return operation()
    }

    if(account.balance < amount){
        console.clear()
        console.log(chalk.bgRed("Valor indisponível!"))
        return operation()
    }

    account.balance = parseFloat(account.balance) - parseFloat(amount)

    fs.writeFileSync(`accounts/${accountName}.json`, JSON.stringify(account), function(err){
        console.log(err)
    })

    console.log(chalk.green(`Foi realizado um saque de R$${amount} da conta de ${accountName}`))
    operation()
}
