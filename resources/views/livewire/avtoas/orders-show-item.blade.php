<tr>
    @inject('DidrivePhoneService', 'App\Services\DidrivePhoneService')
    {{--    @inject('OrderService', 'App\Services\OrderService')--}}
    <td colspan="3" class="{{ $i->status_class ?? 'xx' }}">

        <abbr title="сколько дней прошло с последних изменений">
            <span
                style="
                    @if( $i->UpdateOldDays > 10 )
                    background-color: red;
                    @elseif ( $i->UpdateOldDays > 2 )
                    background-color: yellow;
                    @endif

"
                class="alert

            p-1">{{ $i->UpdateOldDays }}</span>
        </abbr>

        <abbr title="когда сделали заказ">
            {{ date('d.m.Y H:i', strtotime($i->created_at) ) }}
        </abbr>

        <span style="float:right;">
            Текущий статус: {{ $i->order_status ?? 'null'}} / {{ $i->status ?? 'null'}}
        </span>

    </td>
</tr>

@if(1==1)
    <tr>
        <td colspan="5">
            <div style="max-height: 100px; overflow: auto;">
                {{ str_replace(',',', ',$i) }}
            </div>
        </td>
    </tr>
@endif

<tr style="border-top: 3px solid gray; padding-top: 5px;">

    {{--    @inject('DiDriveController', 'App\Http\Controllers\DiDriveController')--}}

    {{--    <td>--}}
    {{--        <div class="size-3">{{ $i->id }}</div>--}}

    {{--        <svg class="bgl-danger tr-icon" width="63" height="63"--}}
    {{--             viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--            <g>--}}
    {{--                <path--}}
    {{--                    d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z"--}}
    {{--                    fill="#FF2E2E"></path>--}}
    {{--                <path--}}
    {{--                    d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z"--}}
    {{--                    fill="#FF2E2E"></path>--}}
    {{--            </g>--}}
    {{--        </svg>--}}

    {{--    </td>--}}

    <td>
        <h6 class="fs-16 font-w600 mb-0">
            {{ $i->user->name }}

            <div class="pt-2">
                <abbr
                    title="(позвонить) Телефон {{ !empty($i->phone->phone_confirm) ? 'подтверждён '.$i->phone->phone_confirm : 'не подтверждён' }}">
                    <a href="tel:{{ $i->phone->phone ?? 'x' }}" class="text-black"
                       style="background-color: {{ !empty($i->phone->phone_confirm) ? '#AAFFAA' : '#FFFFAA' }}; padding: 1px 5px 1px 5px;"
                    >{{ !empty($i->phone->phone) ? $DidrivePhoneService->phone_number_format($i->phone->phone) : 'нет телефон' }}</a>
                </abbr>
            </div>
            <div class="pt-2">
                <abbr
                    title="(написать) email {{ !empty($i->user->email) ? 'подтверждён '.$i->user->email_verified_at : 'не подтверждён' }}">
                    <a href="mailto:{{ $i->user->email }}" class="text-black"
                       style="background-color: {{ !empty($i->user->email_verified_at) ? '#AAFFAA' : '#FFFFAA' }}; padding: 1px 5px 1px 5px;"
                    >{{ !empty($i->user->email) ? $i->user->email : 'нет email' }}</a>
                </abbr>
            </div>
            {{--            {{ $i->user->email ?? 'нет почты' }}--}}

            <div class="pt-2">
                нужна Доставка<br/>
                <div class="alert alert-info">1231231</div>
            </div>

            <div class="pt-2 alert alert-warning">нужна помощь специалиста</div>

        </h6>
        {{--        <span class="fs-14">Transfer</span>--}}
    </td>
    {{--    <td>--}}
    {{--        <h6 class="fs-16 text-black font-w600 mb-0">{{ date('d.m.Y', strtotime($i->created_at) ) }}</h6>--}}
    {{--        <span class="fs-14">{{ date('H:i', strtotime($i->created_at) ) }}</span>--}}
    {{--        --}}{{--        <h6 class="fs-16 text-black font-w600 mb-0">June 5, 2020</h6>--}}
    {{--        --}}{{--        <span class="fs-14">05:34:45 AM</span>--}}
    {{--    </td>--}}
    <td>

        <table class="table">
            <thead>
            <th>Название</th>
            <th>Цена при заказе</th>
            <th>цена на сайте сейчас</th>
            <th>Кол-во</th>
            </thead>
            <tbody>

            @foreach( $i->order_goods as $g )
                <tr>
                    <td>
                        {{ $g->goodOrigin }}</td>
                    <td>
                        {{ $g->price }}</td>
                    <td>{{$g->good->a_price ?? 'x'}}</td>
                    <td>{{ $g->kolvo }}</td>

                    {{--            {{ $g }}--}}
                    {{--            order_goods: {{ str_replace(',',', ',$g) }}        <br/>        <br/>--}}
                    {{--            $g->good: {{ str_replace(',',', ',$g->good) }}        <br/>        <br/>--}}
                    {{--            @foreach( $g as $k1 => $v1 )--}}
                    {{--                {{ $k1 }}: {{ $v1 }}--}}
                    {{--                <hr/>--}}
                    {{--            @endforeach--}}
                    {{--        1111--}}
                    {{--        <hr>--}}
                    {{--                        @foreach( $g->good as $k1 => $v1 )--}}
                    {{--                            {{ $k1 }}: {{ $v1 }}--}}
                    {{--                            <hr/>--}}
                    {{--                        @endforeach--}}
                    {{--            <br/>--}}
                    {{--            <br/>--}}
                </tr>
            @endforeach

            </tbody>
        </table>

    </td>
    <td>
        <div class="alert alert-warning">{{ $i->order_status ?? 'null'}}</div>
        @foreach($order_status as $o)
            <br/>
            <button class="btn btn-light btn-outline-info"
                    wire:click="setOrderStatus('{{$i->id}}','{{$o}}')">
                {{ $o }}</button>
        @endforeach
    </td>
    {{--    <td><span class="fs-16 text-black font-w600">-$167</span></td>--}}
    {{--    <td><span class="text-light fs-16 font-w500 text-end d-block">Pending</span>--}}
    </td>
</tr>
@if(1==2)
    {{--    <tr>--}}
    {{--        <td colspan="5">{{ $i }}</td>--}}
    {{--    </tr>--}}
    <tr>
        <td colspan="5">{{ $i }}</td>
    </tr>
@endif
