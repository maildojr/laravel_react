import { Routes, Route } from 'react-router-dom';

import Layout from './Layout';
import Home from 'pages/Home';
import NotFound from 'pages/Auth/PageNotFound';

export function Router() {
    return (
        <Routes>
            <Route path="/" element={<Layout />}>
                <Route index element={<Home />} />
            </Route>
            <Route path="*" element={<NotFound />} />
        </Routes>
    )
}