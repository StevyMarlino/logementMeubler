<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="ti-shopping-cart text-success"></i> Mes Réservations</h3>
                            <div class="text-right"><span class="text-muted">Mes Réservations du jours</span>
                                @if($today_orders_count > $yesterday_orders)
                                    <h1><sup><i class="ti-arrow-up text-success"></i></sup>  {{ number_format($today_orders_count) }}</h1>
                                @else
                                    <h1><sup><i class="ti-arrow-down text-danger"></i></sup>  {{ number_format($today_orders_count) }}</h1>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="ti-wallet text-info"></i> Revenue Stats</h3>
                            <div class="text-right"><span class="text-muted">Mes Revenues de la semaine</span>
                                <h1> XAF {{ number_format($total_week_sale) }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="ti-stats-up"></i> Vente annuelle </h3>
                            <div class="text-right"><span class="text-muted"> Entrée annuelle </span>
                                <h1> XAF {{ number_format($this_month_orders) }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="ti-stats-up"></i> Revenue Du jours</h3>
                            <div class="text-right"><span class="text-muted"> Entrée journalier</span>
                                <h1> XAF {{ number_format($today_orders) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
            </div>
        </div>
    </div>
</x-app-layout>
