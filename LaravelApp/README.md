# Shop home

Shop home e' un prototipo di web application sviluppato utilizzando il framework Laravel, che permette agli utenti di effettuate la spesa in un supermercato virtuale. L'utente puo' quindi svogliare i prodotti a catalogo, cercarli e filtrarli per categoria. Puo' quindi aggiungerli ad un carrello e procedere ad eseguire il checkout. Idealmente il supermercato consegnerà appena possibile, la spesa presso il domicilio indicato dall'utente.

# Installazione del portale

Per poter installare il portale, e' necessario eseguire l'upload di tutto il progetto su un server con installato Apache. Quindi e' necessario inserire modificare i dati di accesso al database MySql all'interno del file database.php all'interno della cartella "config" sulla root del progetto. Il portale utilizza inoltre il database "Redis" per la gestione del carrello. Per il corretto funzionamento, e' quindi necessario installare e avviare un server Redis. E' quindi necessario, inserire i dati di accesso al server redis all'interno della sezione redis del file database.php. Per costruire il database iniziale e' necessario eseguire il comando "php artisan make:migration" a partire dalla root del progetto. Verranno quindi utilizzati i file di migrazione .php all'interno del percorso database/migration per costruire il database di cui necessita il portale. In alternativa e' possibile importare manualmente il database dal pannello di amministrazione del database, utilizzando il file database.sql individuabile sulla root del progetto.

# Architettura
## I controller
Il progetto e' sviluppato con rigoroso rispetto del design pattern MVC. Sono presenti 12 controller, 6 all'interno del percorso app/http/controllers e altri 6 in app/http/controllers/auth.
- CategorieController gestisce le categorie dei prodotti: creazione, modifica, recupero generando le rispettive View.
- MainController gestisce l'home page del sito. La visualizzazione e la navigazione tra le altre pagine web
- OrderController gestisce gli ordini degli utenti. Creazione, consultazione, visualizzazione, ecc..
- OrderRowController gestisce l'accesso ai singoli elementi di un ordine: creazione/modifica/cancellazione
- ProductController in modo analogo gestisce i prodotti esistenti: creazione/modifica/cancellazione
- UserController gestisce l'account utente: login, logout, profilo ecc...
## I model
Gli oggetti contenenti i dati primitivi utilizzati dal portale (sono anche i Data Access Object al database) sono i seguenti, individuali all'interno del percorso "App":
- Categorie
- Order
- OrderRows
- Product
- User

## Le View
Le View che corrispondono alle pagine web o a singoli elementi costruiti con HTML/CSS/JS. Sono localizzate all'interno del percorso "resources/views" e si dividono in 1. "includes" elementi da poter includere nelle pagine (menu, header, user bar, ecc...). 2. pages, ovvero le pagine web richiamate dai controller e che a loro volta utilizzano le view costruisce all'interno di "includes" 3. I layout, nel nostro caso uno, che definisce la struttura della pagina web per tutte le pagine e include i componenti usati da tutto il progetto: bootstrap, jquery, ecc..

## Gli oggetti TypeScript
Gli oggetti in Javascript presenti in "public/js" sono generati dagli oggetti scritti in TypeScript presenti in "public/ts". Chiunque voglia usufruire della potenza di TypeScript puo' modificare o aggiungere nuovi file .ts all'interno di public/ts.

## JQuery
E' possibile utilizzare JQuery in qualsiasi pagina web del progetto, infatti e' integrato a livello globale per tutte le pagine web.

## Shop Home - Supporto Tecnico

Per qualsiasi chiarimento tecnico sul progetto, si prega di inviare una email a: agatinomoschitta@gmail.com






## License

Shop Home e' un open-source, rilasciato sotto licenza GNU GPL
