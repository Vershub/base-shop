import { useForm } from '@inertiajs/vue3'

interface Entity {
    translates?: Array<{
        locale_code: string;
    }>;
}

export function useEntityForm(activeLocale: string, entity: Entity) {
    const form = useForm({
        locales: entity.translates
            ? entity.translates.reduce<Record<string, typeof entity.translates[number]>>
            ((acc, translate) => {
                acc[translate.locale_code] = translate;
                return acc;
            }, {})
            : {
                [activeLocale]: {},
            },
        static: entity ? Object.fromEntries(
            Object.entries(entity).filter(([key]) => !['id', 'translates', 'created_at', 'updated_at', 'media'].includes(key))
        ) : {}
    });

    return {
        form
    }
}