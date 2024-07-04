import { useState } from 'react';
import {Head, router} from '@inertiajs/react';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function ProjectCreate({auth}) {
    const [values, setValues] = useState({
        title: "",
        slug: "",
        description: "",
        publication_date: "",
        thumb_image: null,
        seo_keywords: "",
        amount: "",
        user_id: "",
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.type === 'file' ? e.target.files[0] : e.target.value;
        setValues(values => ({
            ...values,
            [key]: value,
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();

        const formData = new FormData();
        Object.keys(values).forEach(key => {
            formData.append(key, values[key]);
        });

        router.post('/dashboard/project', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
    }

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Создать проект</h2>}
        >
            <Head title="Создать проект"/>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <form onSubmit={handleSubmit} className='flex flex-col text-gray-500'>
                                <label htmlFor="title">Title:</label>
                                <input id="title" value={values.title} onChange={handleChange} />

                                <label htmlFor="slug">Slug:</label>
                                <input id="slug" value={values.slug} onChange={handleChange} />

                                <label htmlFor="description">Description:</label>
                                <textarea id="description" value={values.description} onChange={handleChange} />

                                <label htmlFor="publication_date">Publication Date:</label>
                                <input type="datetime-local" id="publication_date" value={values.publication_date} onChange={handleChange} />

                                <label htmlFor="thumb_image">Thumbnail Path:</label>
                                <input id="thumb_image" type="file" onChange={handleChange} />

                                <label htmlFor="seo_keywords">Keys:</label>
                                <input id="seo_keywords" value={values.seo_keywords} onChange={handleChange} />

                                <label htmlFor="amount">Amount:</label>
                                <input id="amount" value={values.amount} onChange={handleChange} />

                                <label htmlFor="user_id">User ID:</label>
                                <input id="user_id" value={values.user_id} onChange={handleChange} />

                                <button className='py-2 px-3 bg-indigo-400 w-auto mt-5' type="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
