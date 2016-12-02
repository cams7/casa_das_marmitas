<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [        
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Funcionario::class, function (Faker\Generator $faker) {    
    return [
        'id' => null,
        'cargo' => $faker->numberBetween(1, 2)
    ];
});

$factory->define(App\Empresa::class, function (Faker\Generator $faker) { 
    static $TOTAL_CIDADES = 3;
    
    $i  = rand(0, $TOTAL_CIDADES - 1);

    return [
        'user_id' => App\User::all()->random()->id,
        'nome' => $faker->unique()->company,
        'cnpj' => $faker->unique()->cnpj(false),
        'email' => $faker->unique()->companyEmail,
        'telefone' => "31".$faker->unique()->phone(false),
        'cep' => getCep($i),
        'cidade' => getCidade($i),
        'bairro' => getBairro($i),
        'logradouro' => $faker->streetName,
        'numero_imovel' => $faker->buildingNumber,
        'complemento_endereco' => null,
        'ponto_referencia' => null
    ];
});

$factory->define(App\Entregador::class, function (Faker\Generator $faker) {    
    return [
        'user_id' => App\User::all()->random()->id,
        'empresa_id' => null,
        'nome' => $faker->unique()->name,
        'cpf' => $faker->unique()->cpf(false),
        'rg' => $faker->unique()->rg(false),
        'celular' => "319".$faker->cellphone(false)
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    static $TOTAL_CIDADES = 3;

    $i  = rand(0, $TOTAL_CIDADES - 1);

    return [
        'user_id' => App\User::all()->random()->id,
        'nome' => $faker->unique()->name,
        'nascimento' => $faker->dateTimeBetween('-60 years', '2000-01-01'),
        'telefone' => "31".$faker->unique()->phone(false),
        'cep' => getCep($i),
        'cidade' => getCidade($i),
        'bairro' => getBairro($i),
        'logradouro' => $faker->streetName,
        'numero_residencial' => $faker->buildingNumber,
        'complemento_endereco' => null,
        'ponto_referencia' => null
    ];
});

$factory->define(App\Taxa::class, function (Faker\Generator $faker) {    
    static $TOTAL_TAXAS = 3;
    
    static $i  = 0;

    if($i >= $TOTAL_TAXAS)
        return null;

    return [
        'user_id' => App\User::all()->random()->id,
        'taxa' => getTaxa($i++),
        'tipo_taxa' => $i
    ];
});

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    static $TOTAL_TIPOS = 4;
    static $TOTAL_TAMANHOS = 3;

    static $j  = 0;
    static $i  = 0;

    if($j >= $TOTAL_TAMANHOS){
        $i++;
        $j = 0;
    }

    if($i >= $TOTAL_TIPOS)
        return null;

    return [
        'user_id' => App\User::all()->random()->id,
        'nome' => getMarmita($i),
        'ingredientes' => getIngrediente($i),
        'custo' => getCusto($i, $j++),
        'tamanho' => $j
    ];
});

$factory->define(App\Pedido::class, function (Faker\Generator $faker) {        
    return [
        'user_id' => App\User::all()->random()->id,
        'cliente_id' => null,
        'taxa_id' => null,
        'quantidade_total' => null,
        'total_pedido' => null,
        //Pendente, Em trânsito, Cancelado, Entregue
        'situacao_pedido' => $faker->numberBetween(1, 4)
    ];
});

$factory->define(App\PedidoItem::class, function (Faker\Generator $faker) {    
    return [
        'pedido_id' => null,
        'produto_id' => null,
        'quantidade'=> null
    ];
});

function getCidade($i)
{
    $CIDADES = array("Belo Horizonte", "Sabará", "Santa Luzia");
    return $CIDADES[$i];
}

function getCep($i)
{
    $CEP = array(
        //Belo Horizonte
        rand(30001970, 31999899), 
        //Sabará
        rand(34505000, 34750970), 
        //Santa Luzia
        rand(33010000, 33199899)
    );

    return $CEP[$i];
}

function getBairro($i)
{
    $BAIRROS = array(
        //Belo Horizonte
        array(
            //Barreiro
            "Conjunto Ademar Maldonado", "Araguaia", "Vila Alta Tensão", "Conjunto Átila de Paiva", "Bairro das Indústrias I", "Barreiro", "Vila Bernadete", "Conjunto Boa Esperança", "Bonsucesso", "Conjunto Bonsucesso", "Brasil Industrial", "Cardoso", "Vila Castanheiras", "Vila Cemig", "Vila Copasa", "Cristo Redentor", "Diamante", "Conjunto Esperança", "Flávio Marques Lisboa", "Conjunto Flávio de Oliveira", "Vila Formosa", "Independência", "Itaipu", "Vila Jardim do Vale", "Jatobá", "Jatobá IV", "Lindéia", "Regina", "Mangueiras", "Vila Marieta", "Marilândia", "Milionários", "Mineirão", "Miramar", "Novo das Indústrias", "Novo Santa Cecília", "Olaria", "Olhos d'Água", "Petrópolis", "Vila Petrópolis", "Pilar", "Vila Piratininga", "Conjunto Pongelupe", "Conjunto Renato Ernesto do Nascimento", "Santa Cecília", "Santa Helena", "Santa Margarida", "Santa Rita", "Vila Santa Rita", "Serra do José Vieira", "Sol Nascente", "Solar", "Solar do Barreiro", "Teixeira Dias", "Tirol", "Conjunto Túnel de Ibirité", "Urucuia", "Vale do Jatobá", "Vila Nova dos Milionários", "Vila Pinho", "Washington Pires",
            //Centro-Sul
            "Anchieta", "Antiga Cidade da Serra", "Barro Preto", "Boa Viagem", "Carmo", "Centro", "Cidade Jardim", "Conjunto Santa Maria", "Coração de Jesus", "Cruzeiro", "Funcionários", "Lourdes", "Luxemburgo", "Mangabeiras", "Monte de São José", "Morro do Papagaio", "Nossa Senhora da Conceição", "Novo Anchieta", "Novo São Lucas", "Novo Sion", "Pilar", "Santa Efigênia", "Santa Isabel", "Santa Lúcia", "Santo Agostinho", "Santo Antônio", "São Bento", "São Lucas", "São Pedro", "Savassi", "Serra", "Sion", "Soberana", "Vila Acaba Mundo", "Vila Aparecida", "Vila Ápia", "Vila Cafezal", "Vila Estrela", "Vila Marçola", "Vila Morro do Querosene", "Vila Nossa Senhora de Fátima", "Vila Papagaio", "Vila Paris", "Vila Pindura Saia", "Vila Santa Lúcia", "Vila Santa Maria", "Vila Santana do Cafezal",
            //Leste
            "Abadia", "Alto da Boa Vista", "Alto Vera Cruz", "Américo Wernek" /*(antigo Colônia/Floresta)*/, "Ana Lúcia", "Bairro da Graça", "Baleia", "Belém", "Bias Fortes" /*(antigo Colônia/Santa Ifigênia)*/, "Boa Vista", "Buraco Quente", "Caetano Furquim", "Cafezal", "Camponesa", "Casa Branca", "Castanheira", "Cidade Jardim Taquaril", "Cônego Pinheiro", "Conselheiro Rocha", "Cruzeiro do Sul", "Edgard Wernek", "Esplanada", "Esplanada I", "Esplanada II-A", "Esplanada II-B", "Floresta", "Freitas", "Granja de Freitas", "Horto", "Horto Florestal", "Instituto Agronômico", "João Alfredo", "Jonas Veiga", "Mariano de Abreu", "Nova Vista", "Novo Horizonte", "Novo São Lucas", "Paraíso I", "Paraíso II", "Parque Cidade Jardim", "Cruzeiro do Sul", "Parque Nossa Senhora do Rosário", "Pirineus", "Política", "Pompeia", "Santa Efigênia", "Sagrada Família", "Santa Inês", "Santa Tereza", "Santana do Cafezal", "Santos Torres", "São Geraldo", "São Rafael", "São Vicente", "Saudade", "Serra" /*(8ª seção suburbana, Belo Horizonte)*/, "Taquaril", "Teresa Cristina A", "Vera Cruz", "Vila Área", "Vila Grota", "Vila Nossa Senhora Aparecida", "Vila Nossa Senhora do Rosário", "Vila Rock in Rio",
            //Nordeste
            "Bairro da Graça", "Beija-Flor", "Beira Linha" /*(parte da Vila Dom Silvério, São Gabriel, Triba, Parque Belmonte e Jardim Belmonte)*/, "Belmonte", "Cachoeirinha", "Capitão Eduardo", "Cidade Nova", "Colégio Batista", "Concórdia", "Conjunto Habitacional Capitão Eduardo", "Conjunto Habitacional Dom Silvério", "Conjunto Habitacional Fernão Dias", "Conjunto Habitacional Goiânia", "Conjunto Habitacional Paulo VI", "Conjunto Habitacional São Gabriel", "Dom Joaquim", "Dom Silvério", "Eymard", "Fernão Dias", "Goiânia", "Ipê", "Ipiranga", "Jardim Vitória", "Lagoinha", "Maria Goretti", "Maria Virgínia", "Nazaré", "Nova Floresta", "Novo Aarão Reis", "Ouro Minas", "Palmares", "Parque Riachuelo", "Paulo VI", "Pirajá", "Pousada Santo Antônio", "Renascença", "Santa Cruz", "São Cristóvão", "São Gabriel", "São José/Gorduras", "São Marcos", "São Paulo", "Silveira", "União", "Vila Antônio Ribeiro de Abreu", "Vila Artur de Sá", "Vila Beija-flor" /*(Borges)*/, "Vila Boa União", "Vila Brasília" /*(Guanabara)*/, "Vila Carioca", "Vila Coqueiro" /*(Beco)*/, "Vila Corococó", "Vila da Paz", "Vila do Pombal", "Vila Humaitá" /*(Inestan)*/, "Vila Ipiranga", "Vila Maria", "Vila Matadouro", "Vila Nova Cachoeirinha IV", "Vila Nova Cachoeirinha III", "Vila Presidente Vargas" /*(São Benedito)*/, "Vila São Paulo" /*(Andiroba, Modelo, Praça da Associação, Suzana)*/, "Vila Tiradentes", "Vila Três Marias", "Vila Universitário", "Vila Vista do Sol", "Vista do Sol",
            //Noroeste
            "Alípio de Melo", "Alto dos Caiçaras", "Alto dos Pinheiros", "Álvaro Camargos", "Aparecida", "Aparecida Sétima Seção", "Bom Jesus", "Bonfim", "Caiçara Adelaide", "Caiçaras", "Califórnia", "Camargos", "Carlos Prates", "Conjunto Califórnia", "Conjunto Califórnia Dois", "Conjunto Celso Machado", "Conjunto Itacolomi", "Coqueiros", "Coração Eucarístico", "Dom Bosco", "Dom Cabral", "Ermelinda", "Filadélfia", "Frei Eutáquio", "Gameleira", "Glalija", "Glória", "Governador Benedito Val", "Inconfidência", "Ipanema", "Jardim Alvorada", "Jardim Montanhês", "João Pinheiro", "Lagoinha", "Minas Brasil", "Monsenhor Messias", "Nova Cachoeirinha", "Nova Esperança", "Padre Eustáquio", "Pedreira Prado Lopes", "Pedro II", "Pindorama", "Primavera", "Santa Maria", "Santo André", "São Cristóvão", "São Salvador", "Sumaré", "Vila Oeste", "Vila Virgínia", "Serrano",
            //Norte
            "1º de Maio", "Conjunto Felicidade", "Conjunto Floramar", "Aarão Reis", "Canaã", "Conjunto Mariquinhas", "Conjunto Zilah de Souza Spósito", "Etelvina Carneiro", "Felicidade", "Floramar", "Guarani", "Heliópolis", "Monte Azul", "Jaqueline", "Jardim Felicidade", "Jardim Guanabara", "Juliana", "Lajedo", "Marize", "Planalto", "Minaslândia", "Monte Azul", "Novo Aarão Reis", "Providência", "Ribeiro de Abreu" /*(Conjunto Ribeiro de Abreu)*/, "São Bernardo", "Solimões", "Tupi", "Tupi A", "Tupi B", "Vila Aeroporto", "Vila Bacuraus", "Vila Biquinhas", "Vila Boa União", "Vila Clóris", "Vila São Tomás", "Xodó",
            //Oeste
            "Alto Barroca", "Bairro das Industrias", "Bairro das Manções", "Barroca", "Belvedere", "Betânia", "Buritis", "Cabana Pai Tomaz", "Calafate", "Camargos", "Cinqüentenário", "Conjunto Betânia", "Conjunto Estrela d'Alva", "Conjunto Santa Maria", "Estoril", "Gameleira", "Glalijá", "Grajaú", "Gutierrez", "Havaí", "Jardim América", "Justinópolis", "Madre Gertrudes", "Marajó", "Morro das Pedras", "Nova Barroca", "Nova Cintra", "Nova Gameleira", "Nova Granada", "Nova Suíça", "Olhos d'Água", "Palmeiras", "Parque São José", "Patrocínio", "Prado", "Salgado Filho", "Santa Lúcia", "Serra do José Vieira", "Vila Oeste", "Vista Alegre",
            //Pampulha
            "Aeroporto", "Bandeirantes", "Braúnas", "Castelo", "Céu Azul" /*(4ª seção)*/, "Cidade Universitária", "Conjunto Confisco", "Conjunto Habitacional Lagoa", "Conjunto Helena Antipoff", "Conjunto Nova Pampulha", "Conjunto Vila Rica", "Copacabana", "Dona Clara", "Engenho Nogueira", "Garças", "Indaiá", "Itapoã", "Itatiaia" /*(conhecido também como Santa Terezinha)*/, "Jaraguá", "Jardim Atlântico", "Liberdade", "Manacás", "Mariana", "Novo Itapuã", "Novo Ouro Preto", "Ouro Preto", "Pampulha", "Paquetá", "Santa Amélia", "Santa Branca", "Santa Mônica", "Santa Rosa", "Santa Teresinha", "São Bernardo", "São Francisco", "São José", "São Luís", "São Tomás", "Saramenha", "Sarandí", "Serrano", "Suzana", "Trevo", "Universitário", "Urca", "Vila do Índio", "Vila Isabel", "Vila Maria Virgínia", "Vila Paquetá", "Vila Santa Cruz", "Vila Santa Rosa", "Vila São Miguel", "Vila São Vicente", "Vila Real", "Vila Unida", "Xangrilá",
            //Venda Nova
            "Candelária", "Cenáculo", "Centro de Venda Nova", "Copacabana", "Esplendor", "Europa", "Flamengo", "Jardim dos Comerciários", "Jardim Europa", "Jardim Leblon", "Kátia", "Lagoa", "Jardim Leblon", "Letícia", "Mantiqueira", "Maria Helena", "Minas Caixa", "Nova América", "Nova York", "Novo Letícia", "Paraúna", "Piratininga", "Rio Branco", "São João Batista", "São Paulo", "Serra Verde", "Sinimbu", "Universo", "Várzea das Palmas", "Venda Nova", "Vila Antena", "Vila Apolônia", "Vila Capri", "Vila Copacabana", "Vila dos Anjos", "Vila Estrela", "Vila Itamarati", "Vila Mãe dos Pobres", "Vila Mantiqueira", "Vila Minas Caixa", "Vila Nossa Senhora Aparecida", "Vila São João Batista", "Vila Santa Branca", "Vila São José", "Vila Serra Verde", "Vila Sesc"
        ),
        //Sabará
        array(
            "Carvalho de Brito", "Mestre Caetano", "Ravena", "Adelmolândia", "Água Férrea", "Alto do Cabral", "Alto do Fidalgo", "Alvorada", "Ana Lúcia", "Área Rural de Sabará", "Arraial Velho", "Borba Gato", "Borges", "Caieira", "Centro", "Conjunto Morada da Serra", "Córrego da Ilha", "Distrito Industrial Simão da Cunha", "Esplanada", "Fogo Apagou", "Itacolomi", "Jardim Castanheiras", "Mangabeiras", "Mangueiras", "Morro da Cruz", "Morro São Francisco", "Nações Unidas", "Nossa Senhora da Conceição", "Nossa Senhora de Fátima", "Nossa Senhora do Ó", "Novo Alvorada", "Novo Horizonte", "Novo Santa Inês", "Paciência", "Padre Chiquinho", "Pompeu", "Praia dos Bandeirantes", "Rio Negro", "Roça Grande", "Rosário", "Santana", "Santo Antônio" /*(Roça Grande)*/, "São José", "Siderúrgica", "Sobradinho", "Terra Santa", "Valparaíso", "Vila Amélia Moreira", "Vila Bom Retiro", "Vila Campinas", "Vila dos Coqueiros", "Vila Esperança", "Vila Eugênio Rossi", "Vila Francisco de Moura", "Vila Marzagão", "Vila Michel", "Vila Nova Vista", "Vila Real", "Vila Rica", "Vila Santa Cruz", "Vila Santa Rita", "Vila Santo Antônio de Pádua", "Vila São Sebastião", "Códigos Postais"
        ),
        //Santa Luzia
        array(
            "Adeodato", "Área Rural de Santa Luzia", "Asteca" /*(São Benedito)*/, "do Divino", "Baronesa" /*(São Benedito)*/, "Barreiro do Amaral", "Bela Vista", "Belo Vale", "Bicas", "Boa Esperança", "Bom Destino", "Bom Jesus", "Bonanza", "Camelos", "Casa Branca", "Castanheira", "Centro", "Colorado", "Comunidade Sítio Teresópolis", "Condomínio Estância dos Lagos", "Conjunto Cristina" /*(São Benedito)*/, "Conjunto Palmital" /*(São Benedito)*/, "Córrego Frio", "Distrito Industrial Simão da Cunha", "Dona Rosarinha", "Duquesa I" /*(São Benedito)*/, "Duquesa II" /*(São Benedito)*/, "Esplanada", "Frimisa", "Gameleira", "Granja Santa Inês" /*(São Benedito)*/, "Idulipê", "Imperial", "Industrial Americano", "Kennedy", "Liberdade", "Londrina" /*(São Benedito)*/, "Luxemburgo", "Maria Adélia", "Monte Carlo", "Morada do Rio", "Moreira", "Natividade", "Nossa Senhora da Conceição", "Nossa Senhora das Graças", "Nossa Senhora do Carmo", "Nova Conquista" /*(São Benedito)*/, "Nova Esperança", "Nova Esperança" /*(São Benedito)*/, "Novo Centro", "Padre Miguel", "Padre Miguel" /*(São Benedito)*/, "Pérola Negra", "Petrópolis", "Pinhões", "Pousada Del Rey" /*(São Benedito)*/, "Quarenta e Dois", "Recanto Flamboyant", "Rio das Velhas", "Santa Helena", "Santa Matilde", "Santa Mônica", "Santa Rita", "São Benedito", "São Cosme de Baixo" /*(São Benedito)*/, "São Cosme de Cima" /*(São Benedito)*/, "São Geraldo", "São João Batista", "Sítio Boa Vista", "Três Corações", "Vale das Acácias", "Vale do Tamanduá", "Vila Beatriz" /*(São Benedito)*/, "Vila das Mansões", "Vila Íris", "Vila Olga", "Vila Otoni", "Vila Santa Mônica", "Vila Santo Antônio" /*(São Benedito)*/, "Vila São Mateus", "Outros Códigos Postais", "São Benedito"
        )
    );

    $total = count($BAIRROS[$i]);

    return $BAIRROS[$i][rand(0, $total - 1)];
}

function getTaxa($i)
{
    $TAXA = array(
        //Extra
        0.50, 
        //Entrega            
        1.25, 
        //Cartão
        2.00
    );

    return $TAXA[$i];
}

function getMarmita($i)
{
    $MARMITAS = array(
        "Marmita com bife e ovo", 
        "Marmita com bife e salada", 
        "Marmita com frango e creme", 
        "Marmita com frango e salada"
    );
    
    return $MARMITAS[$i];
}

function getIngrediente($i)
{
    $INGREDIENTES = array(
        "Arroz, feijão, bife e ovo frito",
        "Arroz, feijão, bife e salada de tomate",        
        "Arroz, feijão, file de frango e creme de milho",
        "Arroz, feijão, file de frango e salada de tomate"
    );
    
    return $INGREDIENTES[$i];
}

function getCusto($i, $j)
{
    $CUSTOS = array(
        //Grande, Média e Pequena
        array(18.00, 15.00, 12.25),
        array(15.00, 11.50, 9.00),
        array(14.00, 9.50, 7.00),
        array(10.00, 7.25, 5.00)
    );

    return $CUSTOS[$i][$j];   
}