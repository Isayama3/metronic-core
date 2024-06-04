        @for ($i = 0; $i < $rating; $i++)
            <div class="rating-label checked">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
        @endfor
        @if ($rating == 0)
            <div class="rating-label">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
            <div class="rating-label">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
            <div class="rating-label">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
            <div class="rating-label">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>
            <div class="rating-label">
                <i class="ki-duotone ki-star fs-1"></i>
            </div>

        @endif
