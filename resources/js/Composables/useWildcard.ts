import { ref, Ref } from "vue";

interface UseWildcard {
  randomItem: Ref<string>;
  getRandomItem: (listName: string) => Promise<void>;
}

export default function useWildcard(): UseWildcard {
  const randomItem = ref("");

  async function getRandomItem(listName: string) {
    const serverAddress = "https://localhost:3000";

    try {
      const response = await fetch(`${serverAddress}/wildcards/${listName}`);

      if (!response.ok) {
        console.error(await response.text());
        randomItem.value = "Error: Unable to fetch random item";
        return;
      }

      randomItem.value = await response.text();
    } catch (error) {
      console.error("Error fetching random item:", error);
      randomItem.value = "Error: Unable to fetch random item";
    }
  }

  return { randomItem, getRandomItem };
}
