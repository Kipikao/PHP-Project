<x-appo-layout>

    @section('navadmin1')


    <hr style="margin-block: 20px;">
    <x-mesaj>

    </x-mesaj>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <strong class="text-red-500">Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <div class="mt-6 border-t border-white/10">
                    <dl class="divide-y divide-white/10">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Nr</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->id }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Nume</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->name }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Întrebare</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->message }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Raspuns</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->answer }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Status</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->status }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Creat la</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ date('d.m.Y H:m', strtotime($question->created_at)) }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Modificat la</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-900 dark:text-gray-100 sm:col-span-2 sm:mt-0">{{ $question->update_at ? : '-' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="button_style">
                <x-edit-button>
                    <a href="{{ route('editQuestion', ['id' => $question])}}">Edit</a>
                </x-edit-button>

                <x-delete-button >
                    <form method="post" action="{{ route('destroyQuestion', ['id' => $question ])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Șterge" />
                    </form>
                </x-delete-button>
            </div>
        </div>
    </div>

    <hr style="margin-block: 20px;">
    <hr style="margin-block: 20px;">

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="bannerQue1 font-semibold leading-6 text-gray-900">Întrebări</h1>
                <p class="mt-2 text-sm text-gray-700">Lista cu toate întrebările.</p>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nr</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nume</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Dată adăugare</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Dată modificare</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">View</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($questions as $val)

                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $val->id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $val->name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $val->created_at }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $val->updated_at }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $val->status }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <x-view-button>
                                            <a href="{{ route('viewQuestion',['id' => $val]) }}" class="text-indigo-600 hover:text-indigo-900">View<span class="sr-only">, Lindsay Walton</span></a>
                                        </x-wiew-button>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <x-edit-button>
                                            <a href="{{ route('editQuestion', ['id' => $val])}}">Edit</a>
                                        </x-edit-button>
                                    </td>
                                </tr>
                                @endforeach
                                ​
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            {{ $questions->links() }}
        </div>
    </div>
    @endsection

    @section('navadmin2')

    <p class="bannerQue">Pagină vizualizare întrebări</p>

    <img src="{{ asset('img/pngegg2.png') }}" alt="Pagina intrebari">


    @endsection


</x-appo-layout>