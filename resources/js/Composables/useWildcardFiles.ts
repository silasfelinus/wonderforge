import { ref, Ref } from "vue";

interface UseWildcardFiles {
  files: Ref<string[]>;
  fetchFiles: () => Promise<void>;
}

export default function useWildcardFiles(): UseWildcardFiles {
  const files = ref<string[]>([]);

  async function fetchFiles() {
    const serverAddress = "https://localhost:3000";

    try {
      const response = await fetch(`${serverAddress}/wildcards`);

      if (!response.ok) {
        console.error(await response.text());
        return;
      }

      files.value = await response.json();
    } catch (error) {
      console.error("Error fetching files:", error);
    }
  }

  return { files, fetchFiles };
}
