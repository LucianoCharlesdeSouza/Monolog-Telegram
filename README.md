# Monolog-Telegram
Exemplo de uso da classe LogTelegram, onde  a mesma faz o envio dos logs para um grupo telegram via bot pré configurado

# Criando seu bot
1. Na pesquisa global do Telegram, digite @BotFather
![https://github.com/LucianoCharlesdeSouza/Monolog-Telegram/BotFather.png]
    - Agora, estando no Pai dos Bot's voce irá digitar /newbot
    - Será solicitado um nome para seu bot ( digite e dê enter )
    - Próximo passo será pedido um nome de usuário, **DEVERÁ TERMINAR COM A PALAVRA** bot ( Ex: meubot, meu_bot )
    - Você receberá um token ( 109152333:XSHiotkf57Q_Bw7RidyojTQ54tfbJZkcq-T )
    - E um link para a [API do TELEGRAM](https://core.telegram.org/bots/api)
2. Antes de clicar no links fornecido, crie um grupo no Telegram e adicione o bot recem criado a este grupo    
3. Em posse do token voce podera acessar o link da api da seguinte forma,
    - ```https://api.telegram.org/bot<token>/METHOD_NAME```
    - Trocando <token> pelo token recem recebido do BotFather e METHOD_NAME por getMe,
    - Tendo uma url como essa ```https://api.telegram.org/bot109152333:XSHiotkf57Q_Bw7RidyojTQ54tfbJZkcq-T/getMe```
    - Feito isso, poderá ser visto os dados de seu bot, como abaixo
```
{
    "ok": true,
    "result": {
        "id": 409125119,
        "is_bot": true,
        "first_name": "LogTelegram",
        "username": "logtelegrambot"
    }
}
```
    
4. Alterando agora o parametro METHOD_NAME da url atual para getUpdates, ficando  ```https://api.telegram.org/bot109152333:XSHiotkf57Q_Bw7RidyojTQ54tfbJZkcq-T/getUpdates```,veremos mais informações.
    - A informação que precisaremos será o id do chat
    - Procure pelo id do chat que mais se repete (pois pode ser que haja mudanças se voce ficar trocando os previlégios do grupo e do bot)
```
{"chat": {
        "id": -1001266140188,
        "title": "logtelegrambot",
        "type": "supergroup"
    }
}
```
    
5. Pronto, estando dentro da pasta do projeto, basta pegarmos o token e o chat id e passarmos no arquivo config.php e rodarmos o seguinte comando no terminal, 
```composer install```

