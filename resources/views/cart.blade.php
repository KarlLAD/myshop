@vite('/resources/css/app.css')
<h1> Panier</h1>
<table>
    <thead>
        <tr>
            <th>
                Nom du produit
            </th>
            <th>
                Quantité
            </th>
            <th>
                Prix unitaire
            </th>
            <th>
                Prix total
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($cart as $itemcart)
        <tr>
            <th>
                <p>{{ $itemcart->product_id }}</p>
            </th>
            <td>
                <p>{{ $itemcart->quantity }}</p>
            </td>
            <td>
                <p>{{ $itemcart->price }}€</p>
            </td>

            <td>
                <p>{{ $itemcart->price * $itemcart->quantity }}€</p>
            </td>
        </tr>
        {{-- calcul total du panier --}}

        <!-- div hidden : le calcul n'est pas afficher -->
        <div hidden>
            {{ $somme = ($itemcart->price) * ($itemcart->quantity) + $somme }}

        </div>

        @endforeach

    </tbody>
</table>
<p> Total du panier = {{ $somme }} €</p>
<a href="{{ route('addtocart', '$cart') }}">Valider mon panier</a>
