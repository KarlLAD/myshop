@vite('resources/css/app.css')


<h3>{{ Str::limit($product->name) }}</h3>

<div>
    <a href="#"
        class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">{{ $product->category->name }}</a>


    <img class="h-20 w-20 object-cover object-center" height="50" src="{{ Storage::url($product->image) }}"
        alt="" />

    <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0">

        <a href="shop-product-sidebar-right.html  " class="text-color-dark text-color-hover-primary">
            {{ Str::limit($product->name), 30 }}
        </a>
    </h3>


</div>




<!-- afficher la description du produit -->
<label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description du produit : </label>

<p>
    <textarea rows="6"
        class="block p-2.5 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
    {{ $product->description }}
    </textarea>
</p>
<!--  quantité de produit -->

<div class="custom-select-1"> Quantité :
    <!-- Previous Button -->
    <a href="#"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
        Previous
    </a>
    <select name="quantity" id="quantity-select" class="form-control form-select">
        <!-- <option value="all" selected>Toutes les Catégories
        </option> -->
        <option value="1" selected>1 </option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>

    <!-- Next Button -->
    <a href="#"
        class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
        Next
    </a>

</div>


<p>{{ $product->prix }} € </p>

<a href="{{ route('addtocart', $product) }}"
    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">Ajouter
    au panier</a>
