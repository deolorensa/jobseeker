<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Penilaian Kinerja Online HRIS Kompas">
        <meta name="author" content="HRIS Interns">

        <title>Add — Candidate</title>

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
                <div>
                    <a href="{{ url()->previous() }}" class="flex items-center text-blue-800 mb-7">
                        <i icon-name="arrow-left" class="mr-2 w-5 h-5"></i>
                        <p>Halaman sebelumnya</p>
                    </a>
                    <h1 class="font-semibold text-[32px] text-slate-700 mb-4">Edit Candidate</h1>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center gap-x-2.5">
                            <li class="inline-flex items-center">
                                <a href="{{ route('candidate.index') }}" class="inline-flex items-center text-blue-800">
                                    Home Candidate
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i icon-name="chevron-right" class="text-gray-400 mr-2 w-5 h-5"></i>
                                    <span class="text-gray-400">Edit Candidate</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="flex flex-col gap-y-5 max-w-[600px] max-sm:w-full">
                    <p class="font-medium text-slate-600 text-xl">Edit Candidate Data</p>
                    <form action="{{ route('candidate.update', $candidate->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="flex flex-col gap-y-6 max-w-3xl">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col bg-white rounded-xl shadow-xl">
                            <p class="font-medium py-3.5 px-5">
                                Edit Candidate
                            </p>
                            <hr/>
                            <div class="flex flex-col p-5 gap-5">
                                <input type="hidden" name="id" value="{{$candidate->id}}">
                                <div>
                                    <label for="email" class="block mb-2">Email <span class="text-red-600">*</span></label>
                                    <input name="email" value="{{ old('email', $candidate->email) }}" type="email" min="0" id="email" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('email')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="phone_number" class="block mb-2">Phone Number <span class="text-red-600">*</span></label>
                                    <input name="phone_number" value="{{ old('phone_number', $candidate->phone_number) }}" type="number" min="0" id="phone_number" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('phone_number')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="full_name" class="block mb-2">Full Name <span class="text-red-600">*</span></label>
                                    <input name="full_name" value="{{ old('full_name', $candidate->full_name) }}" type="text" min="0" id="full_name" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('full_name')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="dob" class="block mb-2">Day of Birth <span class="text-red-600">*</span></label>
                                    <input name="dob" value="{{ old('dob', $candidate->dob) }}" type="date" min="0" id="dob" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('dob')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="pob" class="block mb-2">Place of Birth <span class="text-red-600">*</span></label>
                                    <input name="pob" value="{{ old('pob', $candidate->pob) }}" type="text" min="0" id="pob" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('pob')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="gender" class="block mb-2">Gender <span class="text-red-600">*</span></label>
                                    <select name="gender" id="gender" class="bg-white border border-gray-300 text-sm rounded-lg block w-full px-1.5 py-2.5">
                                        @if (isset($candidate->gender))
                                        <option value="{{$candidate->gender}}">
                                        @if($candidate->gender == "M" )
                                            Male
                                        @else
                                            Female
                                        @endif
                                        </option>
                                        @endif
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="year_exp" class="block mb-2">Year Experience <span class="text-red-600">*</span></label>
                                    <input name="year_exp" value="{{ old('year_exp', $candidate->year_exp) }}" type="text" min="0" id="year_exp" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('year_exp')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="last_salary" class="block mb-2">Last Salary <span class="text-red-600">*</span></label>
                                    <input name="last_salary" value="{{ old('last_salary', $candidate->last_salary) }}" type="text" min="0" id="last_salary" class="bg-white border border-gray-300 text-sm rounded-lg block w-full p-2.5"  >
                                    @error('last_salary')
                                        <div class="mt-2 capitalize-first text-sm text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end gap-x-4 mt-2 mr-3 mb-3 gap-y-3">
                                <a href="{{ route('candidate.index') }}" class="text-white text-center bg-red-600 py-3 px-10 rounded-full">
                                    Batal
                                </a>
                                <button type="submit" class="text-white bg-blue-700 py-3 px-10 rounded-full">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
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

    </body>
</html>
