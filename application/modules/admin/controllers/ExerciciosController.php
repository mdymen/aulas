<?php

include APPLICATION_PATH.'/Forms/Exercicios/Perguntas.php';
include APPLICATION_PATH.'/Decorators/Exercicios.php';
include APPLICATION_PATH.'/decorators/Form.php';
include APPLICATION_PATH.'/forms/slide/adicionar.php';
class Admin_ExerciciosController extends Zend_Controller_Action {
    
    public function init() {}
    
    public function indexAction() {
        $this->view->perguntas = $this->verbotobe4();
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
        
        $p[3]['pergunta'] = "Whose notebook is this? - It's ...(her, their, his)";
        $p[3]['nome'] = 'pergunta4';
        $p[3]['resposta'] = 'his';

        $p[4]['pergunta'] = "- Is this your pen? - No, it's ...(yours, their, my)";
        $p[4]['nome'] = 'pergunta5';
        $p[4]['resposta'] = 'yours';
        return $p;
    }    
}
