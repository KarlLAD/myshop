@vite('/resources/css/app.css')
<h1>Validation</h1>


<div class="flex justify-center items-center h-screen bg-gray-200 text-gray-900">
    <div class="rounded-md relative w-72 shadow-2xl p-3 bg-white">
        <div class="py-2">
            <div class="text-center text-xl font-bold">ORDER</div>
            <div class="text-center text-xs font-bold">The order details</div>
        </div>
        <div class="text-center text-xs font-bold mb-1">~~~~~~~~~~~~~~~~~~~~~~~~~~~~</div>
        <div class="text-xs pl-2">

            <div class="text-xs mb-1">Customer：Jack</div>
            <div class="text-xs mb-1">TelePhone：182****8888</div>
            <div>OrderNumber：17485554487748500</div>
        </div>

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
                        <!-- afficher lae produit non son id (product_id) -->
                        @foreach ($product as $itemProduct)

                        @if (($itemcart->product_id)==($itemProduct->id))
                        {{ $itemProduct->name }}
                        @endif

                        @endforeach
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

        <p> Total du montant= {{ $somme }} €</p>
    </div>
</div>

<div class="text-xs">
    <div class="mb-1">Frais de livraison : {{ $port }}€</div>
    <div class="text-xs">
        <div class="mb-1">Prix total de la commande : </div>

        <!-- calcul de commande+ frais de livraison -->
        {{ $somme + $port }}


        <!-- component -->

        <div class="border-double border-t-4 border-b-4 border-l-0 border-r-0 border-gray-900 my-3">
            <div class="flex text-sm pt-1 px-10">
                <span class="w-20">Name</span>
                <span class="w-20 text-right">Price</span>
                <span class="w-20 text-right">Quantity</span>
            </div>
            <div class="border-dashed border-t border-b border-l-0 border-r-0 border-gray-900 mt-1 my-2 py-2 px-1">

                <div class="flex justify-between text-sm">
                    <span class="w-2/6 truncate">Gym suit</span>
                    <span class="w-2/6 text-right">$9998</span>
                    <span class="w-2/6 text-right">1</span>
                </div>

            </div>

            <!-- 1315555 -->
        </div>
        <div class="text-xs">
            <div class="mb-1">Discount：￥50</div>
            <div class="mb-52">Remark：--</div>
            <div class="text-right">
                <div>Time：2020-12-21</div>
                <div class="font-bold text-sm">Aggregate：￥700</div>
            </div>
        </div>
