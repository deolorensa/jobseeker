<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Penilaian Kinerja Online HRIS Kompas">
        <meta name="author" content="HRIS Interns">

        <title>Home — Candidate</title>

        <!-- Favicon -->
        {{--  <link rel="icon" type="image/png" href="{{ asset('assets/images/kompas_logo.png') }}" />  --}}

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"/>
        <style>

        </style>
        <!-- Script -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="bg-gray-50 my-20">
        <main id="main-content" class="container mx-auto ">
            <div class="flex flex-col gap-y-10">
                <h1 class="text-4xl text-slate-900 font-bold">Data Candidate</h1>
                <div class="flex flex-col gap-y-5">
                    <div class="flex justify-between gap-3 max-sm:flex-col sm:items-center">
                        <p class="text-xl font-medium text-gray-500">Daftar Candidate</p>
                        <a href="{{route('candidate.create')}}" class="bg-[#005596] text-white rounded-xl justify-center px-6 py-3">
                            <div class="flex gap-x-2">
                                <i icon-name="plus"></i>
                                <p>Tambah</p>
                            </div>
                        </a>
                    </div>

                    <div class="p-5 shadow-xl bg-white rounded">
                        <div class="overflow-x-auto relative rounded-lg py-1">
                            <table id="table_datatables" class="display" cellspacing="0" width="100%">
                                <thead class="bg-[#E1F0FF]">
                                    <tr>
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Full Name</th>
                                    <th>Day of Birth</th>
                                    <th>Place Of Birth</th>
                                    <th>Gender</th>
                                    <th>Year Experience</th>
                                    <th>Last Salary</th>
                                    <th class="!text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $index => $candidate)
                                    <tr>
                                        <td class="bg-white">{{ $index+1 }}</td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->phone_number }}</td>
                                        <td>{{ $candidate->full_name }}</td>
                                        <td>{{ $candidate->dob }}</td>
                                        <td>{{ $candidate->pob }}</td>
                                        <td>
                                        @if($candidate->gender == "M" )
                                            Male
                                        @else
                                            Female
                                        @endif
                                        </td>
                                        <td>{{ $candidate->year_exp }}</td>
                                        <td>{{ $candidate->last_salary }}</td>
                                        <td>
                                        <div class="flex gap-x-3 justify-center">
                                            <a href="{{route('candidate.edit', $candidate->id)}}" class="bg-[#2579D1] text-white rounded-xl px-5 py-2">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{route('candidate.destroy', $candidate->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-600 pt-2">
                                                    <i icon-name="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Script -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

        <script src="https://unpkg.com/lucide@latest"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.1.1/dist/flasher.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher-toastr@1.1.1/dist/flasher-toastr.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

        <script>
            lucide.createIcons();
        </script>

        <script>
            $(document).ready(function () {
                var table = $("#table_datatables").DataTable({
                    oLanguage: {
                        oPaginate: {
                            sPrevious: "«",
                            sNext: "»",
                        },
                    },
                });
            });
        </script>
    </body>
</html>
