import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import toast from 'react-hot-toast';

export default function HomeView() {

    const { todo } = usePage().props;

    console.log(todo);

    const status = todo.status;

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Home View
                </h2>
            }
        >
            <Head title="Home View" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <div className="overflow-x-auto">
                                <div className="flex justify-between">
                                    <h1 className="font-semibold text-lg">
                                        {todo.name}
                                    </h1>

                                    {todo.status === "pending" ? (
                                        <span className="text-lg bg-amber-400 p-1 rounded-md">
                                            {todo.status}
                                        </span>
                                    ) : (
                                        <span className="text-lg bg-green-500 p-2">
                                            {todo.status}
                                        </span>
                                    )}
                                </div>
                                <div className='flex gap-2 justify-end my-5'>
                                    <button className='btn btn-success btn-sm '>
                                        Update
                                    </button>
                                    <button className='btn btn-error btn-sm '>
                                        Delete
                                    </button>
                                    <Link href={"/home"} className='btn btn-primary btn-sm '>
                                        Back
                                    </Link>
                                </div>
                                <div className='flex '>
                                    {todo.created_at}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
