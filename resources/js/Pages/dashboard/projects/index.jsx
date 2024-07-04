import {Head, Link, usePage} from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";


export default function Project({projects, auth}) {

    const ProjectsData =  projects.data.map(project => (
        <tr key={project.id} className='border-b border-gray-200'>

            <td className="py-4 text-center"> <Link href={route('admin.project.show', project.slug)}>{project.title}</Link></td>
            <td className="py-4 text-center">{auth.username}</td>
            <td className="py-4 text-center">{project.publication_date}</td>
            <td className="py-4 text-right">
                Nope
            </td>
        </tr>
    ))

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Проекты</h2>}
        >
            <Head title="Проекты"/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <div className='mb-10'>
                                <Link className="py-2 px-3 rounded bg-indigo-500" href={route('admin.project.create')}>Добавить проект</Link>
                            </div>
                            <table className="w-full">
                                <thead>
                                    <th>Название</th>
                                    <th>Автор</th>
                                    <th>Дата публикации</th>
                                    <th className="text-right">Действия</th>
                                </thead>
                                <tbody>
                                {ProjectsData}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    )
}
