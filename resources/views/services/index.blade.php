@extends("layouts.main")

@section("content")

    <div class="d-flex flex-column-fluid" id="dev-case-list">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Servicios
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        {{--<div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                            <span class="navi-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>--}}
                        <!--end::Dropdown-->

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded" id="kt_datatable" style="">
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
                                        <span style="width: 250px;">Ciudad</span>
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
                                    <th class="datatable-cell datatable-cell-sort">
                                        <span style="width: 130px;">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="service in cases">
                                    <td class="datatable-cell">
                                        @{{ service.name }}
                                    </td>
                                    <td class="datatable-cell">
                                        @{{ service.email }}
                                    </td>
                                    <td class="datatable-cell">
                                        @{{ service.city }}
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
                                    <td>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#serviceModal" @click="show(service)"><i class="far fa-eye"></i></a>
                                        <button class="btn btn-secondary" @click="erase(service.id)"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ page }} de @{{ pages }}</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="kt_datatable_previous" v-if="page > 1">
                                            <a href="#" aria-controls="kt_datatable" data-dt-idx="1" tabindex="0" class="page-link">
                                                <i class="ki ki-arrow-back"></i>
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item active" v-for="index in pages">
                                            <a href="#" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                                        </li>
                                        
                                        <li class="paginate_button page-item next" id="kt_datatable_next" v-if="page < pages" href="#">
                                            <a href="#" aria-controls="kt_datatable" data-dt-idx="7" tabindex="0" class="page-link" @click="fetch(page + 6)">
                                                <i class="ki ki-arrow-next"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->

        <!-- Modal-->
        <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Servicio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" readonly v-model="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RUT</label>
                                        <input type="text" class="form-control" readonly v-model="rut">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" readonly v-model="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" readonly v-model="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Caso</label>
                                        <input type="text" class="form-control" readonly v-model="caseName">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categoría de caso</label>
                                        <input type="text" class="form-control" readonly v-model="type">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" readonly v-model="city">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Comuna</label>
                                        <input type="text" class="form-control" readonly v-model="commune">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" readonly v-model="commune">@{{ description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" @click="markAsSeen()" class="btn btn-primary font-weight-bold" v-if="status == 'Pendiente'" >Marcar como visto</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-case-list',
            data(){
                return{
                    id:"",
                    cases:[],
                    name:"",
                    rut:"",
                    email:"",
                    phone:"",
                    caseName:"",
                    type:"",
                    city:"",
                    commune:"",
                    status:"",
                    description:"",
                    pages:0,
                    page:1,
                    loading:false
                }
            },
            methods:{
                
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/services/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.cases = res.data.cases
                        this.pages = Math.ceil(res.data.casesCount / res.data.dataAmount)

                    })
                    

                },
                show(service){

                    this.id = service.id
                    this.name = service.name
                    this.rut = service.rut
                    this.email = service.email
                    this.phone = service.phone
                    this.caseName = service.case
                    this.type = service.type
                    this.city = service.city
                    this.commune = service.commune
                    this.description = service.description
                    this.status = service.status

                },
                markAsSeen(){

                    axios.post("{{ url('services/mark-as-seen') }}", {id: this.id}).then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "¡Excelente!",
                                text: res.data.msg,
                                icon: "success",
                            })

                            //alert(res.data.msg)
                            this.status = ""
                            this.fetch()

                        }else{

                            swal({
                                title: "Lo Sentimos!",
                                text: res.data.msg,
                                icon: "error",
                            })

                            //alert(res.data.msg)

                        }

                    })

                },
                erase(id){

                    swal({
                        title: "¿Estás seguro?",
                        text: "Eliminarás este caso!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.loading = true
                            axios.post("{{ url('/services/delete/') }}", {id: id}).then(res => {
                                this.loading = false
                                if(res.data.success == true){
                                    swal({
                                        title: "Genial!",
                                        text: "Producto eliminado!",
                                        icon: "success"
                                    });
                                    this.fetch()
                                }else{

                                    swal({
                                        title: "Lo sentimos!",
                                        text: res.data.msg,
                                        icon: "error"
                                    });

                                }

                            })

                        }
                    });

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush