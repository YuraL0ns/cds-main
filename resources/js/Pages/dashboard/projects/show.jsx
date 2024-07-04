import {Head} from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function projectShow({project, auth}) {
    const data = project.data
    return  (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{data.title}</h2>}
        >
            <Head title={data.title}/>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <h1 className='text-4xl my-4'>{data.title}</h1>
                            <small>{data.publication_date}</small>
                            <small>{data.user_id}</small>
                            <p className='font-medium text-2xl text-indigo-500  py-3'>{data.amount} Рублей</p>
                            <p className='text-justify font-medium text-base py-3'>{data.description}</p>
                            <img className='w-full' src={data.thumb_image} alt={data.title}/>

                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
)
}
