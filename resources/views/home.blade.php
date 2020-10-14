@extends('layouts.main')

@section("content")

    <div class="container" id="dev-main">
        <div class="row">
            <div class="col-xl-12">

                <!--begin::Mixed Widget 15-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title font-weight-bolder">Casos</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        
                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded table-responsive" id="kt_datatable" style="">
                                <table class="table">
                                    <thead>
                                        <tr >
                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 250px;">Nombre</span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 250px;">Email</span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 250px;">Teléfono</span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 250px;">Tipo de caso</span>
                                            </th>

                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 130px;">Categoría de caso</span>
                                            </th>
                                            <th class="datatable-cell datatable-cell-sort">
                                                <span style="width: 130px;">Status</span>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <tr v-for="service in cases">
                                                <td class="datatable-cell">
                                                    @{{ service.name }}
                                                </td>
                                                <td class="datatable-cell">
                                                    @{{ service.email }}
                                                </td>
                                                <td>
                                                    @{{ service.phone }}
                                                </td>
                                                <td>
                                                    @{{ service.case }}
                                                </td>
                                                <td>
                                                    @{{ service.type }}
                                                </td>
                                                <td>
                                                    @{{ service.status }}
                                                </td>
                                                
                                            </tr>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!--end: Datatable-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 15-->

                </div>

        </div>


    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-main',
            data(){
                return{
                    cases:[]
                }
            },
            methods:{
                
                casesFetch(){


                    axios.get("{{ url('/services/fetch/1') }}")
                    .then(res => {

                        this.cases = res.data.cases

                    })
                    

                },
                


            },
            mounted(){
                
                this.casesFetch()

            }

        })
    
    </script>

@endpush