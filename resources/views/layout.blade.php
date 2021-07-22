<!DOCTYPE html>
<html lang="es">
<head>
    {{-- Para evitar el caché --}}
    {{-- <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache"> --}}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Inventario')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script defer rc="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="{{URL::asset('js/nav-menu.js')}}"></script>
    <script src="https://kit.fontawesome.com/89b8204556.js" crossorigin="anonymous"></script>
    <script defer src="{{URL::asset('js/buscar_cod_patrimonial.js')}}"></script>
    <style>
    </style>
</head>
@include('partials/nav')
@include('partials/status')
<body background="{{asset('img/sicuanii.jpg')}}">
    @include('partials/user-info')
    @yield('content')
    {{-- <main>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed cum vel officia quidem vitae, sequi nihil magni, cumque quod eos error mollitia provident voluptates sint accusantium iusto enim eveniet animi ad recusandae, beatae libero. Sunt amet, dicta rerum excepturi iure vitae, sit perferendis esse quasi incidunt error quaerat modi tempora facilis est dignissimos totam voluptate a quia placeat veritatis dolores! Unde necessitatibus tenetur hic tempora voluptas, expedita accusantium, aperiam minima in earum, at animi nisi explicabo quas molestiae ex voluptatibus aspernatur modi qui totam labore cumque incidunt? Maiores sit, voluptatum doloremque quas quae, cum ipsam natus nemo architecto, nihil animi excepturi rerum pariatur iste corrupti necessitatibus numquam? Non culpa tempore cum. Dolores eos ab laudantium ut officiis dicta dignissimos quo omnis perferendis in nemo odit quidem fugiat laborum, consectetur quibusdam. Perspiciatis voluptates obcaecati nam, voluptatibus accusamus deserunt? Praesentium illum eos quis maxime dicta, voluptas molestiae dolorum blanditiis non dolor velit iste voluptates? Aut, illum reiciendis ad alias quo sapiente adipisci dicta sed. Esse laudantium, quas itaque quaerat suscipit corporis rerum, ipsum blanditiis nisi quasi unde voluptatum earum fugiat quia optio deserunt facilis tempore veritatis, quidem minima dolor perspiciatis sequi ratione! Mollitia, debitis blanditiis expedita commodi tempore adipisci quis, dignissimos delectus molestias exercitationem saepe. Minus possimus eveniet omnis suscipit nobis neque, iste tenetur, esse nihil, modi provident illo. Quas sint dignissimos ab excepturi reiciendis nobis vitae, ad possimus, accusamus voluptates natus iusto maxime velit nostrum odit optio aliquam aliquid dolorem at cum consequatur ipsam dolor quia sed! Rerum at laborum autem aspernatur deleniti, eaque eum nihil quibusdam suscipit, ipsam ex velit harum consequuntur recusandae placeat vero et nam architecto? Iste quia laboriosam sed corporis neque, aut vel provident soluta excepturi laudantium doloremque, fugit nemo modi dolorem repellat optio adipisci commodi ad odio delectus architecto officiis distinctio? Dolore harum a delectus cupiditate aliquid, alias asperiores sunt sit enim aperiam nobis facilis magnam, exercitationem voluptatum quia nulla commodi sed assumenda laborum dicta cumque quisquam qui! Debitis, mollitia quas natus impedit explicabo fugit molestias atque dolorum excepturi quam qui aut? Possimus, illum illo! Reprehenderit, voluptates consectetur. A ducimus corporis, labore quia repudiandae qui tenetur accusamus? Dolorum unde architecto et corrupti aliquid sint molestiae quo! Quas dolor dolores aliquam, libero tempore praesentium consequuntur sint eum nobis provident. Corporis dolor dolorem aut at quibusdam, libero, voluptatem nobis distinctio, non veniam dignissimos nisi temporibus. Ex sequi perferendis numquam assumenda cum quisquam sit unde, neque laudantium accusamus illo ea, sunt ducimus molestiae tempore in? Ab accusantium iusto dignissimos. Cumque recusandae, ipsam similique nemo sunt aut. Necessitatibus quas laudantium aliquid architecto, tempore ea molestias fugit dolor quisquam quasi, corrupti aperiam nihil, vero enim ab quo consectetur et nam porro voluptatum deserunt? Eveniet fugit et cum ut eius molestias ab modi nisi voluptatem ex? Et cum corrupti natus labore reiciendis, nostrum, fugit dolorem eius enim quasi officia accusamus illo fuga eligendi atque earum. Ea eum odio commodi labore libero ex beatae veritatis earum quidem alias amet pariatur distinctio dolorum molestiae tempore, enim error neque atque iste necessitatibus. Autem qui iure porro, voluptatum velit a quam? Dignissimos sapiente fuga libero eum laudantium dolorum, amet numquam saepe quod, aperiam reiciendis tempore doloribus cumque? Neque iusto esse ipsam hic! Vitae fuga, tenetur quae dolorum repellendus eos facilis possimus quasi dolore dolores illum natus necessitatibus, assumenda eius sapiente sunt, incidunt deserunt earum excepturi totam delectus quibusdam? Nulla asperiores laborum maxime expedita illum inventore enim possimus quia, ut veniam eaque quod vitae adipisci ducimus iusto laudantium dolore! A, doloribus. Doloremque facere veniam quam, assumenda maiores quo consequuntur nostrum, ipsa cum aliquam fuga doloribus obcaecati a error iusto. Minus aspernatur sed aliquid repellendus necessitatibus sequi pariatur? Laudantium, qui quia! Mollitia qui tempore tenetur sequi quaerat amet laborum commodi temporibus nobis molestias aspernatur autem dolore repudiandae, neque ducimus incidunt distinctio excepturi deserunt labore odit fuga. Quasi necessitatibus, amet inventore aperiam exercitationem veritatis rem eos dignissimos odio a commodi labore fugit, rerum assumenda, mollitia numquam maxime? Iste exercitationem atque consequuntur debitis odit consectetur? Esse quis dolorum, accusantium vel natus aperiam tempora voluptates facere ullam repellat temporibus, optio sit ea. Consequatur at laudantium est ipsa nobis. Dicta, expedita molestiae? Possimus saepe, voluptatem perspiciatis voluptates consequatur quod quia veniam amet asperiores quos temporibus aut magni recusandae. Deleniti saepe atque dolorem perferendis laudantium cumque optio ipsa quisquam nulla ea. Repellendus ipsam cupiditate iure quia beatae molestias assumenda velit nam mollitia corporis consectetur expedita, molestiae consequatur neque ex cum voluptatum, omnis sequi laborum minus. Tenetur mollitia assumenda libero blanditiis praesentium placeat iste totam? Harum blanditiis at laudantium obcaecati nulla magni molestias labore sit nobis veniam, quasi, qui totam. Corrupti magni, dolore quidem sed expedita nostrum eum cum molestiae dolores eaque ipsam in adipisci consequuntur veritatis a similique sunt. Impedit, ab aliquid temporibus eius optio delectus atque ipsa accusantium nisi ullam reprehenderit, repellat quo recusandae ipsam nemo deserunt sequi rerum tenetur iusto culpa laudantium dolor. Est accusantium iure quibusdam repellendus velit perferendis esse quam, pariatur consequuntur repellat deleniti nisi vero. Obcaecati doloribus aliquid corrupti! Quibusdam quas doloremque, obcaecati esse sit nostrum error laborum, adipisci, ratione et incidunt expedita officiis porro minus id facilis corporis! Ipsa possimus corrupti sed minima, repellendus illo voluptatem! Praesentium hic labore libero cupiditate voluptates ratione voluptas? Doloremque architecto sed ea velit recusandae repellat quaerat, asperiores expedita veritatis totam voluptatibus, aperiam odio! Quaerat enim, optio temporibus maxime officia accusamus dolor? Et labore vero possimus asperiores est molestiae sunt, dicta, perferendis distinctio ad maiores aliquam beatae iste ullam atque temporibus corrupti veritatis facere voluptate amet animi laboriosam debitis quod non! Temporibus dolore cum ex vel nesciunt quibusdam accusamus necessitatibus reprehenderit minus vitae porro dolorum, cupiditate veritatis suscipit nisi magni blanditiis commodi? Nihil provident distinctio, temporibus natus maxime possimus dolore voluptatem corrupti quaerat incidunt voluptates animi iure atque? Minus dolore architecto optio voluptas velit quisquam, laborum, reiciendis ullam beatae commodi tenetur sequi? Ipsum quibusdam, quis animi dolor enim, quia deleniti incidunt magni atque eligendi, omnis ipsam! Commodi, labore voluptatem. Illo doloribus id dolorum placeat deserunt aut itaque! Itaque placeat quos suscipit veritatis dolores harum illum voluptatibus officiis magnam similique, ipsam rem inventore.
    </main> --}}
</body>
</html>