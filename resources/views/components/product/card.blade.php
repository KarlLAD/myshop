<div class="col-12 col-sm-6 col-lg-3">
    <div class="product mb-0">
        <div class="product-thumb-info border-0 mb-3">

            <div class="product-thumb-info-badges-wrapper">
                <span class="badge badge-ecommerce badge-success">NOUVEAU</span>

            </div>

            <div class="addtocart-btn-wrapper">
                <!-- shop-cart.html -->
                <a href="{{ route('addtocart', $itemProduct) }}" class="text-decoration-none addtocart-btn"
                    title="Ajouter au panier">
                    <i class="icons icon-bag"></i>
                </a>

            </div>
            <!--  "ajax/shop-product-quick-view.html"-->
            <a href="{{ route('accueil.detail', '$itemProduct->image') }}"
                class="quick-view text-uppercase font-weight-semibold text-2">
                VISUALISATION RAPIDE
            </a>

            {{-- shop-product-sidebar-left.html --}}
            <a href="{{ route('accueil.detail', $itemProduct) }}">1
                <div class="product-thumb-info-image">
                    {{-- @dd($itemProduct->image) --}}
                    @if (isset($itemProduct->image))
                        <img alt="" class="img-fluid" src="{{ Storage::url($itemProduct->image) }}">
                    @else
                        <img alt="" class="img-fluid" src="/img/products/product-grey-1.jpg">
                    @endif

                </div>
            </a>
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#"
                    class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">{{ $itemProduct->category->name }}</a>
                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0">

                    <a href="shop-product-sidebar-right.html  " class="text-color-dark text-color-hover-primary">
                        {{ Str::limit($itemProduct->name), 30 }}
                    </a>
                </h3>
            </div>
            <a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i
                    class="far fa-heart"></i></a>
        </div>
        <div title="Rated 5 out of 5">
            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating
                data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
        </div>
        <p class="price text-5 mb-3">
            <span class="sale text-color-dark font-weight-semi-bold">{{ $itemProduct->prix }}€</span>
            <span class="amount">{{ $itemProduct->prix }}€</span>
        </p>
    </div>
</div>
