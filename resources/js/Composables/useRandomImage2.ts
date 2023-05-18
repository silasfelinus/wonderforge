import { Ref } from "vue";

export function useRandomImage(folderName: Ref<string>) {
  const serverAddress = "https://wonderforge.cafepurr.com";

  const getRandomImage = async (): Promise<string | null> => {
    try {
      console.log(
        `Fetching images from: ${serverAddress}/images?folderName=${folderName.value}`
      );
      const response = await fetch(
        `${serverAddress}/images?folderName=${folderName.value}`
      );
      if (!response.ok) {
        console.error(await response.text());
        return null;
      }

      const imagesList: string[] = await response.json();
      if (imagesList.length === 0) {
        console.error("No images found in the folder");
        return null;
      }

      const randomIndex = Math.floor(Math.random() * imagesList.length);
      return `${serverAddress}/assets/images/${folderName.value}/${imagesList[randomIndex]}`;
    } catch (error) {
      console.error("Error while fetching images:", error);
      return null;
    }
  };

  return {
    getRandomImage,
  };
}
