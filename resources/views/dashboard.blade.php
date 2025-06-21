{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold mb-4">
                        @if(Auth::user()->hasRole('admin'))
                            Welcome, Admin!
                        @elseif(Auth::user()->hasRole('doctor'))
                            Welcome, Doctor!
                        @elseif(Auth::user()->hasRole('patient'))
                            Welcome, Patient!
                        @elseif(Auth::user()->hasRole('staff'))
                            Welcome, Staff!
                        @else
                            Welcome, User!
                        @endif
                    </h3>

                    <p class="mt-4 text-gray-500">
                        Here's what you can do based on your role:
                    </p>

                    <div class="mt-8 text-2xl">
                        @role('admin')
                            <div class="bg-blue-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-blue-800">Admin Panel Access</h4>
                                <ul class="list-disc list-inside text-blue-700 mt-2">
                                    <li><a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:underline">Manage All Users</a></li>
                                    <li><a href="{{ route('admin.roles.index') }}" class="text-blue-600 hover:underline">Manage Roles & Permissions</a></li>
                                    <li>View All Hospital Reports</li>
                                    <li>Configure System Settings</li>
                                </ul>
                            </div>
                        @endrole

                        @role('doctor')
                            <div class="bg-green-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-green-800">Doctor's Tools</h4>
                                <ul class="list-disc list-inside text-green-700 mt-2">
                                    <li><a href="{{ route('doctor.patients') }}" class="text-green-600 hover:underline">View Your Patients</a></li>
                                    <li>Manage Your Appointments</li>
                                    <li>Access Patient Medical Records</li>
                                    <li>Write Prescriptions</li>
                                </ul>
                            </div>
                        @endrole

                        @role('patient')
                            <div class="bg-purple-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-purple-800">Patient Portal</h4>
                                <ul class="list-disc list-inside text-purple-700 mt-2">
                                    <li><a href="{{ route('patient.my-records') }}" class="text-purple-600 hover:underline">View Your Medical Records</a></li>
                                    <li><a href="{{ route('patient.appointments') }}" class="text-purple-600 hover:underline">Book/Manage Appointments</a></li>
                                    <li>Update Your Profile</li>
                                </ul>
                            </div>
                        @endrole

                        @role('staff')
                            <div class="bg-yellow-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-yellow-800">Staff Dashboard</h4>
                                <ul class="list-disc list-inside text-yellow-700 mt-2">
                                    <li><a href="{{ route('staff.patients') }}" class="text-yellow-600 hover:underline">View Patient Directory</a></li>
                                    <li><a href="{{ route('staff.appointments') }}" class="text-yellow-600 hover:underline">Manage All Appointments</a></li>
                                    <li>Register New Patients (Front Desk)</li>
                                    <li>Manage Billing</li>
                                </ul>
                            </div>
                        @endrole

                        {{-- Example of a feature visible to both Doctor and Staff --}}
                        @hasanyrole('doctor|staff')
                            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-gray-800">Common Tools</h4>
                                <p class="text-gray-700 mt-2">Access shared resources for healthcare professionals.</p>
                                <ul class="list-disc list-inside text-gray-700 mt-2">
                                    <li>Hospital News & Announcements</li>
                                    <li>Internal Communications</li>
                                </ul>
                            </div>
                        @endhasanyrole

                        {{-- Example of a feature visible if a user has a specific permission, regardless of role --}}
                        @can('view reports')
                            <div class="bg-red-100 p-4 rounded-lg mb-4">
                                <h4 class="font-semibold text-lg text-red-800">Reporting Tools</h4>
                                <p class="text-red-700 mt-2">Access detailed hospital reports.</p>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
