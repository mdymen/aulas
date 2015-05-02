<?php

include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
include APPLICATION_PATH.'/Decorators/Exercicios.php';
include APPLICATION_PATH.'/decorators/Form.php';
include APPLICATION_PATH.'/forms/slide/adicionar.php';
class Admin_ExerciciosController extends Zend_Controller_Action {
    
    public function init() {}
    
    public function indexAction() {
        $this->view->perguntas = $this->questionsWh7();
    }

    public function questionsWh7() { 
        $p[0]['pergunta'] = "__ is your name? My name is John Chan. (Where, Who, What)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'What';
        
        $p[1]['pergunta'] = "__ do you like better, teddy bears or toy cars. (Whose, Which, What)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Which';
        
        $p[2]['pergunta'] = "__ are you going? I'm going to the market. (Where, Who, What)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Where';      
        
        return $p;
    }         
    
    
    
    public function questionsWh6() { 
        $p[0]['pergunta'] = "__ do you like to eat? I like to eat chicken. (Where, Who, What)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'What';
        
        $p[1]['pergunta'] = "__ do you like better, teddy bears or toy cars. (Whose, Which, What)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Which';
        
        $p[2]['pergunta'] = "__ are you going? I'm going to the market. (Where, Who, What)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Where';      
        
        return $p;
    }         
    
    public function questionsWh5() { 
        $p[0]['pergunta'] = "__ time is it now? It`s nine o`clock. (Where, Who, What)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'What';
        
        $p[1]['pergunta'] = "__ is this lady? She is my favourite teacher. (Where, Who, What)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Who';
        
        $p[2]['pergunta'] = "__ car is this? It is my uncle´s car. (How, Who, Whose)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Whose';      
        
        return $p;
    }     
    
    public function questionsWh4() { 
        $p[0]['pergunta'] = "__ is your school? It is near the post office. (Where, Who, What)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Where';
        
        $p[1]['pergunta'] = "__ is reading in the library? Sue is reading in the library. (Where, Who, What)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Who';
        
        $p[2]['pergunta'] = "__ does Mary get up in the morning? At six o'clock. (When, Which, What)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'When';      
        
        return $p;
    }       
    
    public function questionsWh3() { 
        $p[0]['pergunta'] = "__ is the party?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'When';
        
        $p[1]['pergunta'] = "__ do you usually have lunch with?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Who';
        
        $p[2]['pergunta'] = "__ is the bus station?";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Where';      
        
        return $p;
    }        
    
    public function questionsWh2() { 
        $p[0]['pergunta'] = "__ are your parents now?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Where';
        
        $p[1]['pergunta'] = "__ are you studying English?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Why';
        
        $p[2]['pergunta'] = "__ is your best friend?";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Who';

        $p[3]['pergunta'] = "__ is your favorite color?";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'What';        
        
        return $p;
    }        
    
    public function questionsWh1() { 
        $p[0]['pergunta'] = "__ is your favorite subject?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'What';
        
        $p[1]['pergunta'] = "__ book is yours?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Which';
        
        $p[2]['pergunta'] = "__ do you have English classes?";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'When';

        $p[3]['pergunta'] = "__ is your name?";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'What';        
        
        return $p;
    }    

    public function questionsWh() { 
        $p[0]['pergunta'] = "__ times is it?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'What';
        
        $p[1]['pergunta'] = "__ old are you?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'How';
        
        $p[2]['pergunta'] = "__ do you live with?";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Who';

        $p[3]['pergunta'] = "__ is your birthday?";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'When';        
        
        return $p;
    }
    
    public function vertobe10() {
 
        $p[0]['pergunta'] = "__ Mary a good student? Mary não foi uma boa estudante?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Wasn?t';
        
        $p[1]['pergunta'] = "My dog __ a bad friend. Meu cão não foi um mau amigo.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'wasn?t';
        
        $p[2]['pergunta'] = "My dogs __ good friends. Meus cães foram bons amigos.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'were';
        
        return $p;        
        
    }    
    
    public function vertobe9() {
            
        $p[0]['pergunta'] = "Where were you yesterday? Onde vocês estavam ontem?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'were';
        
        $p[1]['pergunta'] = " We __ here yesterday. Nós não estávamos aqui ontem.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'weren?t';
        
        $p[2]['pergunta'] = "I __ a good student. Eu fui um bom estudante.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'was';
        
        return $p;        
        
    }
    
    public function vertobe8() {
        $p[0]['pergunta'] = " The boy __ here yesterday. O menino estava aqui ontem.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'was';
        
        $p[1]['pergunta'] = "You __ here yesterday. Você estava aqui ontem.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'were';
        
        $p[2]['pergunta'] = "__ you here yesterday?. Vocês estavam aqui ontem?";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Were';
        
        return $p;        
        
    }
    
    public function verbtobe7() {
        $p[0]['pergunta'] = "We are not (We __) ? Nós não somos/estamos";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'aren?t';
        
        $p[1]['pergunta'] = "You are not (You __) ? Vocês não são/estão";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'aren?t';
        
        $p[2]['pergunta'] = "They are not (They __) ? Eles não são/estão";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'aren?t';
        
        return $p;
    }
    
    
     public function verbtobe6() {
        $p[0]['pergunta'] = "She __ __ ? Ela não é/está";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'is not';
        
        $p[1]['pergunta'] = "It __ __ ? Isto não é/está";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'is not';
        

        
        return $p;
    }      
    
     public function verbtobe5() {
        $p[0]['pergunta'] = "I am __ ? Eu não sou/estou";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'not';
        
        $p[1]['pergunta'] = "You __ __ ? Você não é/está";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'are not';
        
        $p[2]['pergunta'] = "He __ not ? Ele não é/está";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        return $p;
    }    
    
    /*





*/
    
    
     public function verbtobe3() {
        $p[0]['pergunta'] = "You __ a student. (Você é um aluno).";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'are';
        
        $p[1]['pergunta'] = "He __ my neighbor. (Ele é meu vizinho).";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'is';
        
        $p[2]['pergunta'] = "She __ at the supermarket. (Ela está no supermercado).";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        return $p;
    }

     public function verbtobe4() {
        $p[0]['pergunta'] = "The dog __ outside. (O cão está lá fora).";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'is';
        
        $p[1]['pergunta'] = "We __ friends. (Nós somos amigas).";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'are';
        
        $p[2]['pergunta'] = "You __ my enemies. (Vocês são meus inimigos).";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'are';

        $p[3]['pergunta'] = "They __ upstairs. (Eles estão lá em cima).";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'are';
        
        return $p;
    }    
    
    public function verbtobe2() {
        $p[0]['pergunta'] = "It __ raining this morning. (Hoje de manhã estava chovendo.)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'was';
        
        $p[1]['pergunta'] = "It __ sunny today. (Hoje o dia está ensolarado.)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'is';
        
        $p[2]['pergunta'] = "I __ twenty years old. (Tenho vinte anos.)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'am';
        
        return $p;
    }
    
    
    public function verbtobe1() {
        $p[0]['pergunta'] = "I __ Italian. (Eu sou Italiano.)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'am';
        
        $p[1]['pergunta'] = "I __ from Spain. (Eu sou da Espanha.)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'am';
        
        $p[2]['pergunta'] = "It __ a computer. (Isto é um computador.)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        return $p;
    }
    
    public function possesives2() {
        $p[0]['pergunta'] = "Can you lend me a pencil? I forgot __ (yours, hers, mine).";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'mine';
        
        $p[1]['pergunta'] = "That is my problem, not __ (yours, mine).";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'yours';
        
        $p[2]['pergunta'] = "This belongs to Sally. It's __ (yours, mine, hers).";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'hers';
        
        return $p;
    }
    
    public function reflexivepronoun2() {
        $p[0]['pergunta'] = "She was waiting for her husband by __.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'herself';
        
        $p[1]['pergunta'] = "Did you go to the park by __?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'yourself';
        
        $p[2]['pergunta'] = "Sometimes Richard prefers to be by __.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'himselft';
        
        return $p;    
    }
    
    
    public function reflexivepronoun1() {
        $p[0]['pergunta'] = "The girl cut __ with a knife.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'herself';
        
        $p[1]['pergunta'] = "He hurt __ last week.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'himself';
        
        $p[2]['pergunta'] = "Angela only thinks about __.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'herself';
        
        return $p;    
    }

    public function subjectpronoun6() {
        $p[0]['pergunta'] = "Can ( I/ me) borrow this book from you?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'I';
        
        $p[1]['pergunta'] = "? Sure, can you give (I/ me) back the other one first?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'me';
        
        $p[2]['pergunta'] = "Angela only thinks about (she/ her/ herself).";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'herself';
        
        return $p;           
    }
    
    public function subjectpronoun5() {
  
        $p[0]['pergunta'] = "We scored as many goals as (they/them) scored.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'they';
        
        $p[1]['pergunta'] = "Can you sing as well as (they/them) sing?";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'they';
        
        $p[2]['pergunta'] = "None are so blind as (they/them) that will not see.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'they';
        
        return $p;          
    }
    
    public function subjectpronoun4() {
        $p[0]['pergunta'] = "You should consult the book. Q: the book = (   )?";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'it';
        
        $p[1]['pergunta'] = "(I/ me) believe Mark and Cindy are the Best employees of the year.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'I';
        
        $p[2]['pergunta'] = "Q: Mark and Cindy = (   )?.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'they';
        
        return $p;       
    }
    
    public function subjectpronoun3() {
        $p[0]['pergunta'] = "(I/ Me) can help her with the new computer.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'I';
        
        $p[1]['pergunta'] = "(He/ him) is travelling with that group of gentlemen.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'He';
        
        $p[2]['pergunta'] = "Question: that group of gentlemen = (them/ they)?.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'them';
        
        return $p;
       
    }
    
    public function subjectpronoun2() {
        $p[0]['pergunta'] = "Elephants are big animals. __ live in Africa and Asia.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'They';
        
        $p[1]['pergunta'] = "I and my brother love football. __ watch football matches on Tv every Sunday.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'We';
        
        $p[2]['pergunta'] = "Kaká and Robinho live in Europe. __ are football players.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'They';
        
        return $p;
    }
    
    public function subjectpronoun1() {
        $p[0]['pergunta'] = "Tom Cruise is American. Tom Cruise is married. Tom Cruise is American. __ is married.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'He';
        
        $p[1]['pergunta'] = "New York is a big city. __ is in the United States.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'It';
        
        return $p;
    }
    
    
    
    
    
    /*
     * CURSO 1
     * 
     * Gramática de Inglês: artigos a e an
     * Complete os espaços com o artigo correto.
     */
    
    /*Há uma regra bem simples: quando a palavra começa com um som de vogal (a, e, i, o, u), então, use ?an? ? você vai perceber que pronunciar essas palavras fica até mais fácil com ?an?. E o contrário: quando a palavra começar com som de consoante, use ?a?.

Assim, você usa ?a? com: ?a ball? (uma bola), ?a glass of water? (um copo de água) e ?a cup of coffee? (uma xícara de café). Com essas palavras, você usa ?an?: ?an umbrella? (um guarda-chuva), ?an ice cream? (um sorvete) e ?an apple? (uma maçã).

Agora, você percebeu que frisei a palavra som quando falei da regra? Então, eis o motivo: quando a palavra começa com ?h? mudo, mesmo o ?h? sendo uma consoante, ela tem som de vogal. Assim, ela requer ?an?: ?an honourable man? (um homem ilustre), ?an honest mistake? (um erro inocente).

Isso também acontece com palavras que começam com vogais que tem som de consoante, é preciso usar ?a?. Mais especificamente quando a palavra começa com ?e? ou ?u? que tem som de ?y? (soando como ?you?) e quando começa com ?o? com som de ?w? (o mesmo som da palavra ?won?). Exemplos: ?a one man army? (um exército de um homem só), ?a European trip? (uma viagem europeia).

Se você se lembrar da regra pelo som e souber as exceções de som (quando vogal soa como consoante, quando consoante soa como vogal), não terá mais problemas para usar os artigos indefinidos em inglês: ?a? e ?an?.

- See more at: http://www.englishtown.com.br/blog/gramatica-em-ingles-quando-usar-a-ou-an/#sthash.iOgyLR5J.dpuf
     * */
    
    public function artigosaean(){
        $p[0]['pergunta'] = "___ arquitect.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'an';
        
        $p[1]['pergunta'] = "__ house.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'a';
        
        $p[2]['pergunta'] = "__ hour.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'an';
        
        $p[3]['pergunta'] = "__ good artist.";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'a';     
        return $p;        
    }
    
   public function artigosaean2(){
        $p[0]['pergunta'] = "___ umbrella.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'an';
        
        $p[1]['pergunta'] = "__ honest man.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'an';
        
        $p[2]['pergunta'] = "__ woman.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'a';
        
        $p[3]['pergunta'] = "__ green apple.";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'a';     
        return $p;        
    }    
 
    /*
     * Gramática de Inglês: Subject Pronouns 
     * Preencha os espaços com o pronome apropriado: SHE, HE, YOU, THEY ou WE.
     * 
     * I. O pronome I, eu, é sempre escrito com maiúscula.

Thou, tu, é forma arcaica. O pronome thou só é usado, atualmente, em linguagem poética ou bíblica.

You, a forma usada, equivale a tu, você, o senhor, a senhora.

He, ele, e she, ela, referem-se a pessoas, animais e coisas personificadas.

It, ele ou ela, pronome neutro, refere-se geralmente a coisa. Pode também referir-se a um bebê, quando não é indicado o sexo.

We, nós.

Ye, vós, o plural de thou, é forma absoleta em prosa. A forma usada é you, que corresponde a vós, vocês, os senhores, as senhoras.

They, eles, elas, plural de he, she e it, refere-se a pessoas, animais e coisas.

Os pronomes retos são usados como sujeitos da oração.

Ex.: I wrote two letters, escrevi duas cartas.
He read the letters, ele leu as cartas.
     */
   public function pronouns(){
        $p[0]['pergunta'] = "__ (Mary and Carla) go to school together.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'they';
        
        $p[1]['pergunta'] = "- Are __ Brazilian too? - No, I'm from Portugal.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'you';
        
        $p[2]['pergunta'] = "(Julia and Mike) __ are good friends..";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'they';
        
        $p[3]['pergunta'] = "Anthony is a student, but __ goes to a different school.";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'he';     
        return $p;        
    }     
    
    /*1. Os Pronomes Pessoais do Caso Reto desempenham papel de sujeito (subject) da oração:

Rachel and I go to the park every day. (Eu e Raquel vamos ao parque todos os dias.)

She is Brazilian. (Ela é Brasileira.)

 

2. Os Pronomes Pessoais do Caso Oblíquo desempenham as seguintes funções:

a) Objeto direto ou indireto:

Alfred loves her. (Alfredo a ama.)

b) Objeto de preposição:

We talked to him last night. (Nós falamos com ele ontem à noite.) */
    
   public function pronouns1(){
        $p[0]['pergunta'] = "(My family and I) __ live in Ohio.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'we';
        
        $p[1]['pergunta'] = "(Claudia and her friends) __ are from Germany.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'they';
        
        $p[2]['pergunta'] = "- I'm a teacher. What about __ ? - I'm a teacher too.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'you';
        
        $p[3]['pergunta'] = "My mother is German, but __ speaks English too.";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'she';     
        return $p;        
    }        
    /*1. É indispensável que se saiba claramente a diferença entre sujeito e objeto.

We saw him at the bookstore. (Nós o vimos na livraria.)
(s.)        (o.)

He saw us at the bookstore. (Ele nos viu na livraria.)
(s.)      (o.)*/
    /*
     * Gramática de Inglês: Pronomes sujeito e objeto
     * Escolha o pronome correto para completar as frases.
     */
    
    public function sujeito1(){
        $p[0]['pergunta'] = "__ love ice-cream. (I, She, Me)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'I';
        
        $p[1]['pergunta'] = "Shelly and __ want to travel to Cuba. (they, me, I)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'I';
        
        $p[2]['pergunta'] = "I know __. She's Mark's sister. (hers, she, her)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'her';
        
        $p[3]['pergunta'] = "Carla and Regina are in my class, but I never see __. (her, them, they)";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'them';     
        return $p;        
    }       

    /*2. You é Pronome Reto (sujeito/subject pronoun) e também Pronome Oblíquo (objeto/object pronoun).

You are a beautiful woman. (Você é uma mulher bonita.)
(s.)

He gave some flowers to you. (Ele deu flores a você.)
                                      (o.)*/
    
    public function sujeito2(){
        $p[0]['pergunta'] = "Where was John yesterday? I didn't see __ all day. (him, you, he)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'him';
        
        $p[1]['pergunta'] = "Kate and Mark never get to class on time! __ are hopeless. (Them, She and him, They)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'They';
        
        $p[2]['pergunta'] = "Where's Claire? __ and Ann can help us. (They, She, Her)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'she';
        
        $p[3]['pergunta'] = "Give __ that book. I need it now. (them, they, me)";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'me';     
        return $p;        
    }
    
    /*3. Em Inglês não há omissão do sujeito como pode ocorrer em Português, salvo em raríssimas exceções e em linguagem muito informal. No caso de sujeito inexistente, oculto ou indeterminado, devemos empregar it, we ou they.

It is easy to play basketball. (É fácil jogar basquete.)

We speak Italian in Italy. (Falamos Italiano na Itália.)*/
    
    public function pronomes1(){
        $p[0]['pergunta'] = "Take these books and put _____ in the table. (it, them, there, is";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'them';
        
        $p[1]['pergunta'] = "Mr. John's secretary was ill last week, so he had to type the letters _____. (yourself, himself, itself, herself) ";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'himself';
        
        $p[2]['pergunta'] = " I've already done my homework. Have you done _____?. (yours, your, it, theirs) ";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'yours';
        
        $p[3]['pergunta'] = "Pronome Demonstrativo correto: Who is ____ woman over there? (this, that, those, these";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'that';     
        return $p;        
    }       
    
    public function pronomes2(){
        $p[0]['pergunta'] = "Qual pronome pode ser usado no lugar de 'me' na sentença a seguir? 'He thought me was talking about the last game.' (you, I, we)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'I';
        
        $p[1]['pergunta'] = "Na frase: 'He was waiting for us.', o pronome 'us' se refere a: (you, they, we)";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'we';
        
        $p[2]['pergunta'] = "Como se diz 'Ela se cortou' em inglês? She cut __ (himself, herself, her)";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'herself';
        
        $p[3]['pergunta'] = " Como se diz 'O carro dele é branco' em inglês? __ is white (Her, His, He)";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'His';     
        return $p;        
    }       
    /*
     * Gramática de Inglês: demonstrativos 
     * Preencha os espaços com a opção correta: this, these, that ou those.
     */
    public function demonstrativos(){
        $p[0]['pergunta'] = "Do you see __ boys over there? They're my cousins from New York.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'those';
        
        $p[1]['pergunta'] = "- Wow, your earrings are so pretty!- Thanks! I usually don't wear jewelry, but __ two are special!";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'these';
        
        $p[2]['pergunta'] = "- I love __ car! - Which one? - The gray one, next to the big truck.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'that';
        
        $p[3]['pergunta'] = "- Do you remember __ shirts we saw at Macy's yesterday? - Yes. - They're on sale today. Let's go there and buy a few.";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'those';     
        return $p;        
    }    
    
    public function demonstrativos2(){
        $p[0]['pergunta'] = "- Jane, is __ your bag? - No, this one is Sara's.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'this';
        
        $p[1]['pergunta'] = "- __ food is delicious! And it looks beautiful too. - I'm glad you like it. ";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'this';
        
        $p[2]['pergunta'] = "- Sorry I'm late! - __'s ok. ";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'that';
        
        $p[3]['pergunta'] = "I like these socks. They're so soft!";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'these';     
        return $p;        
    }    
    
    
    /*b) Pronomes Oblíquos

As formas me, you (thee), him, her, it, us, you (ye), them são usadas:

    1) Como objeto direto:
I saw her yesterday, eu a vi ontem.
She saw us, ela nos viu.
I didn?t see them, não os (as) vi.

    2) Como objeto indireto preposicionado:
We looked at him, olhamos para ele.
He waits for us, ele nos espera.

    3)Como objeto indireto sem preposição;
We gave them a few books, demos-lhes alguns livros.
I told him all that happened, contei-lhe tudo que aconteceu.*/
    
    /*
     * FIM CURSO 1
     */    
    
    public function verbotobe4() {
        $p[0]['pergunta'] = "Joanna and I are in the same class.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Are Joanna and I in the same class?';
        
        $p[1]['pergunta'] = "This egg is rotten.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Is this egg rotten?';
        
        $p[2]['pergunta'] = "Those horses are calm.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Are those horses calm?';
     
        return $p;        
    }    
    
    public function verbotobe3() {
        $p[0]['pergunta'] = "You're from Argentina.";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'Are you from Argentina?';
        
        $p[1]['pergunta'] = "They're in school now.";
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'Are they in school?';
        
        $p[2]['pergunta'] = "They're good with Maths.";
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'Are they good with Maths?';
        
        $p[3]['pergunta'] = 'Joanna and I are in the same class.';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'Are Joanna and I in the same class?';
     
        return $p;        
    }
    
    public function verbotobe2() {
        $p[0]['pergunta'] = 'You (plural) (are, am, is)';
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'are';
        
        $p[1]['pergunta'] = 'He (am, are, is)';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'am';
        
        $p[2]['pergunta'] = 'She (am, are, is)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        $p[3]['pergunta'] = 'They (am, are, is)';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'are';
     
        return $p;
    }
    
    public function verbotobe1() {
        $p[0]['pergunta'] = 'You (singular) (are, am, is)';
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'are';
        
        $p[1]['pergunta'] = 'I (am, are, is)';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'am';
        
        $p[2]['pergunta'] = 'It (am, are, is)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'is';
        
        $p[3]['pergunta'] = 'We (am, are, is)';
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'are';
     
        return $p;
    }
    
    public function completeadverbsAction() {
        $p[0]['pergunta'] = 'They laughed (happy)';
        $p[0]['nome'] = 'pergunta1';
        
        $p[1]['pergunta'] = 'The dog run (quick)';
        $p[1]['nome'] = 'pergunta2';
        
        $p[2]['pergunta'] = 'He solved the problem (easy)';
        $p[2]['nome'] = 'pergunta3';
        
        $p[3]['pergunta'] = 'You are writing too (slow)';
        $p[3]['nome'] = 'pergunta4';

        return $p;
    }

    public function possesives1() {
        $p[0]['pergunta'] = "Whose notebook is this? - It's ...(her, their, his)";
        $p[0]['nome'] = 'pergunta4';
        $p[0]['resposta'] = 'his';

        $p[1]['pergunta'] = "- Is this your pen? - No, it's ...(yours, their, my)";
        $p[1]['nome'] = 'pergunta5';
        $p[1]['resposta'] = 'yours';       
        
        return $p;
    }
    
    public function possesives() {
        $p[0]['pergunta'] = "This book is not Paul's, it's ... (my, hers, mine)";
        $p[0]['nome'] = 'pergunta1';
        $p[0]['resposta'] = 'mine';
        
        $p[1]['pergunta'] = 'Yours car is more expensive than...(yours, hers, his) ';
        $p[1]['nome'] = 'pergunta2';
        $p[1]['resposta'] = 'his';
        
        $p[2]['pergunta'] = 'Our teachers are so much older than...(mine, yours, my)';
        $p[2]['nome'] = 'pergunta3';
        $p[2]['resposta'] = 'yours';
        
        return $p;
    }    
}
