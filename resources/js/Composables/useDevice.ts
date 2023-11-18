import { ref, computed, onMounted } from "vue";

export function useDevice() {
    const isDesktop = ref(false);
    const isTablet = ref(false);
    const isMobile = ref(false);

    const setValues = () => {
        isDesktop.value = window.innerWidth >= 1024
        isTablet.value = window.innerWidth >= 640 && window.innerWidth < 1024
        isMobile.value = window.innerWidth < 640
    }

    onMounted(() => {
        setValues()
    })

    return { isDesktop, isTablet, isMobile }
}