<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factures Numéro #') }}{{ $details->invoice_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white-box printableArea">
                                    <h3><b>{{ __('FACTURE') }}</b> <span class="pull-right">#{{ $details->invoice_number }}</span></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <address>
                                                    <h3> &nbsp;<b class="text-danger">Appartement Efoulan</b></h3>
                                                    <p class="text-muted m-l-5">E 104, Dharti-2,
                                                        <br/> Nr' Viswakarma Temple,
                                                        <br/> Talaja Road,
                                                        <br/> Bhavnagar - 364002</p>
                                                </address>
                                            </div>
                                            <div class="pull-right text-right">
                                                <address>
                                                    <h3>A,</h3>
                                                    <h4 class="font-bold">{{ $details->reservation->client_name }},</h4>
                                                    <p class="text-muted m-l-30">CNI :{{ $details->reservation->identification_card }},
                                                        <br/> Numero Chassis : {{ $details->reservation->immatriculation_number }},
                                                        <br/> Téléphone : {{ $details->reservation->phone }},
                                                    <p class="m-t-30"><b>Facture Date :</b> <i class="fa fa-calendar"></i> {{ $details->created_at->format('d M Y') }}</p>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40" style="clear: both;">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Description</th>
                                                        <th class="text-right">Quantité</th>
                                                        <th class="text-right">Prix unitaire</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>{{ $details->description }}</td>
                                                        <td class="text-right">{{ $details->quantity }} Jours</td>
                                                        <td class="text-right"> XAF {{ number_format($details->unit_price) }} </td>
                                                        <td class="text-right"> XAF {{ number_format($details->total_amount) }} </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="pull-right m-t-30 text-right">
                                                <h3><b>Total :</b> XAF {{ number_format($details->total_amount) }}</h3>

                                                {{--                                                <p>TTC (19,25%) : XAF {{ number_format($details->total_amount*19,25) }} </p>--}}

                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="print" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
